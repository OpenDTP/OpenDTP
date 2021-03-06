# config valid only for Capistrano 3.1
lock '3.2.1'

set :application, 'ODTP'
set :repo_url, 'git@github.com:OpenDTP/OpenDTP.git'

# Default branch is :master
# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }.call

# Default value for :scm is :git
set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
set :log_level, :info

# Default value for :pty is false
set :pty, true

# Default value for :linked_files is []
# set :linked_files, %w{config/database.yml}

# Default value for linked_dirs is []
# set :linked_dirs, %w{bin log tmp/pids tmp/cache tmp/sockets vendor/bundle public/system}

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

set :slack_subdomain, 'opendtp'
set :slack_token, 'dPDEMRxoa27MUhNB3rbOSHjD'
set :slack_channel, '#opendtp_front'
set :slack_username, 'Mr Deploy'
set :slack_emoji, ':odtp:'

# Default value for keep_releases is 5
set :keep_releases, 3

namespace :deploy do

end
