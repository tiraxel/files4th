Vagrant.configure("2") do |config|

#Validaciones previas
#  if 'docker network ls'.include?("vagrant_default")
#    puts "La red vagrant_default ya existe"
#  else
#    puts "Creando la red vagrant_default"
#     'docker network create vagrant_default'
#  end   
  
#Configuracion para el contenedor 1
  config.vm.define "apache1" do |apache|
    apache.vm.provider "docker" do |docker|
      docker.image = "php:7.4-apache"
      docker.ports = ["8260:80"]
      docker.name = "contenedor1"
      docker.volumes = ["/home/pvaldes/cuartoejercicio/contenedor1:/var/www/html"]
      docker.cmd = ["/bin/bash", "-c", "docker-php-ext-install mysqli && apache2-foreground"]
      docker.create_args = [
        "--network", "vagrant_default",
        "--restart", "always",
      ]
    end
  end

#Configuracion para el contenedor 2
  config.vm.define "apache2" do |apache|
    apache.vm.provider "docker" do |docker|
      docker.image = "php:7.4-apache"
      docker.ports = ["8270:80"]
      docker.name = "contenedor2"
      docker.volumes = ["/home/pvaldes/cuartoejercicio/contenedor2:/var/www/html"]
      docker.cmd = ["/bin/bash", "-c", "docker-php-ext-install mysqli && apache2-foreground"]
      docker.create_args = [
        "--network", "vagrant_default",
        "--restart", "always",
      ]
    end
  end  

#Configuracion para el balanceador
  config.vm.define "balanceador" do |nginx|
    nginx.vm.provider "docker" do |docker|
      docker.image = "nginx:latest"
      docker.ports = ["8280:80"]
      docker.name = "balanceador"
      docker.volumes = ["/home/pvaldes/cuartoejercicio/balanceador/nginx.conf:/etc/nginx/nginx.conf"]
      docker.create_args = [
             "--network", "vagrant_default",
             "--restart", "always",
      ]
      docker.remains_running = true
    end
  end

#Configuracion para el contenedor de MySQL
  config.vm.define "db_main" do |db|
    db.vm.provider "docker" do |docker|
      docker.image = "mysql:5.7"
      docker.name = "db-mysql"
      docker.env = {
             MYSQL_ROOT_PASSWORD: "1234",
             MYSQL_DATABASE: "people",
             MYSQL_USER: "usuarioBD",
             MYSQL_PASSWORD: "passBD"
      }
      docker.volumes = ["/home/pvaldes/cuartoejercicio/motorBD:/tmp"]
      docker.ports = ["3306:3306"]
      docker.create_args = [
             "--network","vagrant_default",
             "--restart", "always",
      ]
      docker.remains_running = true
    end
  end

end
