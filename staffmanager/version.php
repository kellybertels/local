<?php
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


//$plugin->version  = yyyymmddxx; the xx is the version of my plug in (starting at 01 for first version and so on).
$plugin->version = 2020100202;
//the plugin requires is the required version for this plugin to work, this number was got from the path: moodle > version.php when this plugin was created.
$plugin->requires  = 2020081400.00;  
//plugin type is local, and the name of plugin is staff manager, this name needs to match with your plugin name.
$plugin->component= 'local_staffmanager';
$plugin->cron = 0;
//plugin release is the version that was released to the the public to use.
$plugin->release = '1.0';
//setting stable allows you to install the plugin
$plugin->maturity= MATURITY_STABLE;