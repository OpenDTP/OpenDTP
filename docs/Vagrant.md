# Vagrant User Documentation

## What is Vagrant ?

### Vagrant

Let's quote wikipedia : Vagrant is free and open-source software for creating and configuring virtual development environments. It can be considered a wrapper around virtualization software such as VirtualBox and configuration management software such as Chef, Salt and Puppet.

To explain this solution in more ... User friendly terms, vagrant is a software taking care of downloading, and configuring Virtual Machines (VM) from configuration files.
With Vagrant all you need is to run a command in your vagrant folder, go take cofee, and when you come back everything is ready for you !


http://www.vagrantup.com/

### Puppet

Puppet is a powerfull provisionner helping vagrant (among other things ...) to deploy configurations into VM. With less effort, you deploy you're packages (PHP, MySQL, RoR, etc ...) and configure them.

http://puppetlabs.com/

### PuPHPet

You don't know puppet nor vagrant ? No worries, PuPHPet is a Saas software helping you to design you're Vagrant and Puppet configuration files. A simple form to fill asking you all you need to work.

https://puphpet.com/

## How to install it ?

### Vagrant

You can use Mac OS, Linux, Windows or whatever OS, everything is here :

http://www.vagrantup.com/downloads.html

Just download your version and follow installation procedure.

### Virtual Box

Since Vagrant is managing VM, he needs a provider. Since lot of them are expansive (like VMWare), we'll use Oracle's solution : VirtualBox.
Once again, you just have to go here :

https://www.virtualbox.org/wiki/Downloads

Just need to download and follow installation procedure.
This will be the last tool you'll need to install.

## How to use it ?

### Deploy it for the first time !

Now that everything's ready, go to your OpenDTP folder with a terminal (for windows users, you can usec md or powershell) and run `vagrant up`.
And that's all ... But since it's the first time, Vagrant will install missing plugins, download the Box (a VM), configure and upgrade it. So you can take a cofee for the time being ...

Where should you checkout OpenDTP ? Well ... it works only on C:\Windows\system32 folder ...
No ! You can checkout it where you want, it doesn't matter, it'll works fine anyway !

### Shutdown ?

It's highly recommanded to shutdown the VM before shuting down your computeur.
To shutdown your VM run the command `vagrant halt`, and `vagrant up` to boot it again.
Since your VM will already be 'provisioned', the next times you'll up the VM will be lot more faster.

### What tools can I find in this VM ?

All URLs quotes in this part are already in your system, thx to vagrant !
So you don't need to add it.

#### OpenDTP

You can access your OpenDTP instance with this url :

http://opendtp.dev

#### PHPMyAdmin

If you don't like mysql console utility, a phpmyadmin is installed.

http://opendtp.phpmyadmin.dev

Logins :
* Login: opendtp
* Password: opendtp

#### Mailcatcher

All mails are blocked by mailcatcher. No more flood to all OpenDTP, and no more risk to send an email to clients. If you want to check sended mails :

http://opendtp.mailcatcher.dev:1080

#### PHPMemcachedAdmin

A powerfull software to monitor memcached activity and send commands to it.

http://opendtp.phpmemcachedadmin.dev

#### Webgrind

Webgrind is an utility reading xdebug dumps for benchmark. How to generate a dump ? Just add a parameter XDEBUG_PROFILE=1 to your URL you want to benchmark and webgrind will do the job.
DON'T flood !! Some dumps can be really heavy and can fill your VM HD.

Sadly, you can't empty your log with valgrind so you have 2 solutions :
* ssh to your VM and run `rm /tmp/cachegrind.out.*`
* or you can reboot your VM, tmp files will be erased.

http://opendtp.webgrind.dev


## Ok ... and now ?

### Login into VM with SSH

In case you need to go deeper in the VM and check some configurations, or simply copy files, you can SSH into it with this :

`vagrant ssh`

sudo rights and no password needed :).

### I wanna be rooooot

Root access are granted inside the VM. To be root you just need to run :

`sudo [my_command]`

to be logged a root :

`sudo su`

And, because we all love to feel like god inside a VM, root access to mysql :

`sudo mysql`

no password needed anywhere.

### Upgrade VM

When you change branches on Git, other developpers can have change BDD or Vagrant configurations files. You can upgrade your installation to match the branch anytime you want, just use :

vagrant provision

It'll run phinx migration and upgrade VM configurations. When everything's done, memcached is flushed, and VM is ready.

### Houston ... My VM is broken !

No worries ! You can destroy your VM to ashes using `vagrant destroy` and deploy it like the first time with `vagrant up`. You can have another cofee ...

### Well ... How do i work now ?

I didn't talk about the OpenDTP sources yet ... Because there's nothing much to tell. Folder is shared with the VM. So you can work without SSH in it.
Just edit it on your folder like before.

## FAQ

### All .dev sites are unknown domain names !

No ! I didn't lie to you ! Everything is done automatically !
But ... It's not perfect yet. First things did you have entered your password when Vagrant asked you ? (stupid questions but it's easy to be a so enthousiastic about this tool that you didn't enter it ...). You can relaunch this step by using :

`vagrant hostmanager`

So ... you did it but it's still not working. Do you have a firewall or a live protection ? Disable host file protection, i assume that your software tell you that he bolcked the file when Vagrant tried to edit it ...

Still not working ?! *_Damn_* ! Open file C:\Windows\system32\drivers\etc\hosts (or /etc/hosts on Un!x and Mac OS), did the file look like this ?

<pre>
# Copyright (c) 1993-2009 Microsoft Corp.
#
# This is a sample HOSTS file used by Microsoft TCP/IP for Windows.
#
# This file contains the mappings of IP addresses to host names. Each
# entry should be kept on an individual line. The IP address should
# be placed in the first column followed by the corresponding host name.
# The IP address and the host name should be separated by at least one
# space.
#
# Additionally, comments (such as these) may be inserted on individual
# lines or following the machine name denoted by a '#' symbol.
#
# For example:
#
#      102.54.94.97     rhino.acme.com          # source server
#       38.25.63.10     x.acme.com              # x client host

# localhost name resolution is handled within DNS itself.
# 127.0.0.1       localhost
# ::1             localhost192.168.56.101   OpenDTP.dev phpmyadmin.dev api.OpenDTP.dev mailcatcher.dev phpmemcachedadmin.dev # VAGRANT ID: 986e0e26-a39d-411f-b1c9-58d26973d5ed
</pre>

Look at the last part, and go to line after localhost in last line, and put an extra empty line at the end of the file. Should look like this :

<pre>
# localhost name resolution is handled within DNS itself.
# 127.0.0.1       localhost
# ::1             localhost
192.168.56.101    OpenDTP.dev phpmyadmin.dev api.OpenDTP.dev mailcatcher.dev phpmemcachedadmin.dev # VAGRANT ID: 986e0e26-a39d-411f-b1c9-58d26973d5ed
</pre>

Should work like a charm now !


### How do I use Phinx !

To use phinx you need to SSH to your VM using vagrant SSH. You'll land in OpenDTP source folder. So you can do as always :

`phinx migrate -c phinx.php -e dev`

`phinx` is an alias to `/data/vendor/bin/phinx`. Nothing more for now :).

### I need to use the OpenDTP API with a WAP ... But what is my IP adress !

Your VM is NAT with your computer, so you can use your computer IP to access the api.
Just be sure to use port 8080 when you try to access to your VM that way.

### I don't like Vagrant

Nothing much I can do for you ...
