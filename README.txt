README.txt for gator.io ad code
---------------------------

CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation and configuration
 * Maintainer

INTRODUCTION
------------

This code allows you to modify the Drupal DFP module so that ads are not served to nonhuman traffic.

Nonhuman traffic is identified using the (paid) Gator.io service (https://gator.io)



REQUIREMENTS
------------

DFP module. Developed on DFP version 7.x-2.x-dev
Not tested on DFP version 8 


INSTALLATION
------------


 - Sign up with the gator.io service, and obtain your access token.
 
 - Insert the access token where shown.

 - Paste this code into dfp.module in the section 
 
     function dfp_preprocess_html(&$variables)

   right after the check for admin path



Author/Maintainer
------------------

 - Philip Denlinger (mindbet) - https://www.drupal.org/u/mindbet


