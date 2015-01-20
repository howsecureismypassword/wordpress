# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "smallhadroncollider/centos-6.4-lamp"
  config.vm.box_version = ">= 1.1"

  config.vm.synced_folder ".wordpress", "/var/www/public"
  config.vm.hostname = "hsimp-wordpress.dev"
  config.vm.network "private_network", ip: "172.31.254.246"

  config.vm.provision "shell", path: "provision.sh"

  config.vm.provider :virtualbox do |v|
    v.name = "hsimp-wordpress"
    v.memory = 512
  end
end
