#
# Cookbook Name:: php-fpm
# Recipe:: default
#
# Copyright 2014, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
include_recipe "yum-remi"

package "php-fpm" do
  action :install
  options '--enablerepo=remi-php55'
end

service "php-fpm" do
  action [ :enable, :start ]
  supports :status => true, :restart => true, :reload => true
end

template 'www.conf' do
  path '/etc/php-fpm.d/www.conf'
  source "www.conf.erb"
  owner 'root'
  group 'root'
  mode '0644'
  notifies :reload, "service[php-fpm]"
end
