#
# Cookbook Name:: memcached
# Recipe:: default
#
# Copyright 2014, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
include_recipe 'yum-remi'

%w{memcached}.each do |pkg|
  package pkg do
    action :install
    options '--enablerepo=remi-php55'
  end
end

service "memcached" do
  action [:enable, :start]
end
