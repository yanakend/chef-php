#
# Cookbook Name:: php-env
# Recipe:: default
#
# Copyright 2014, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
include_recipe 'yum-remi'

%w{
  php 
  php-devel
  php-mbstring
  php-mcrypt
  php-mysqlnd
  php-common
  php-phpunit-PHPUnit
  php-pecl-xdebug
  xhprof
  php-pecl-memcached
}.each do |pkg|
  package pkg do
    action :install
    options '--enablerepo=remi-php55'
  end
end

# composer install
execute 'composer-install' do
  command "curl -sS https://getcomposer.org/installer | php; mv composer.phar /usr/local/bin/composer;"
  not_if 'test -e /usr/local/bin/composer'
end

execute 'composer-install-pkg' do
  command "cd /vagrant/html; composer install;"
  not_if { File.exists?('/vagrant/html/vendor') }
end

