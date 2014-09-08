#
# Cookbook Name:: yum-epel
# Recipe:: default
#
# Copyright 2014, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#
yum_repository 'remi' do
  description 'Les RPM de Remi - Repository'
  mirrorlist 'http://rpms.famillecollet.com/enterprise/6/remi/mirror'
  gpgkey 'http://rpms.famillecollet.com/RPM-GPG-KEY-remi'
  fastestmirror_enabled true
  enabled true
  action :create
end

yum_repository 'remi-php55' do
  description 'Les RPM de Remi PHP55 - Repository'
  mirrorlist 'http://rpms.famillecollet.com/enterprise/6/php55/mirror'
  gpgkey 'http://rpms.famillecollet.com/RPM-GPG-KEY-remi'
  fastestmirror_enabled true
  enabled false
  action :create
end
