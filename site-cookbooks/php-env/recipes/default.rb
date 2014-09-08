#
# Cookbook Name:: php-env
# Recipe:: default
#
# Copyright 2014, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
include_recipe 'yum-remi'

%w{php php-devel php-mbstring php-mcrypt php-mysqlnd php-phpunit-PHPUnit php-pecl-xdebug}.each do |pkg|
  package pkg do
    action :install
    options '--enablerepo=remi-php55'
  end
end

# composer install
execute 'composer-install' do
  command "curl -sS https://getcomposer.org/installer | php; 
           mv composer.phar /usr/local/bin/composer;
           cd /usr/share/nginx/html;
           composer install"
end
