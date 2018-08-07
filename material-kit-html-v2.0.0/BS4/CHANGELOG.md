# Change Log

## [2.0.0] 2018-01-25
### Bootstrap 4 update
- Core base code on Bootstrap 4
- Documentation code base written from scratch
- Speed optimizations
- Class changes : .card-block to .card-body
- .navbar-toggleable-* to .navbar-expand-*
- .hidden-*-down to .d-none .d-*-block
- .hidden-*-up to .d-*-none
- .checkbox to .form-check
- .radio to .form-check
- more class changes here:https://medium.com/@lukaszholeczek/how-to-upgrade-bootstrap-4-alpha-6-to-bootstrap-4-beta-d43b4210f2a3
- Bug fixes for responsive devices
- Small changes for components

## [1.1.0], 11.07.2016 - Minor Updates and Bug Fixes
 - Added colored shadows under the Buttons, Pagination & Nav Pills
 - Removed ".btn-raised" class and made the raised button default (too many persons are using the .btn-raised as the default state so let's keep it simple and with less classes). Find more details in on the Upgrading Info below.
 - Added ".btn-simple" class instead of the default link like buttons. Find more details in on the Upgrading Info below.
 - Added a new color for buttons: White, you can use it with ".btn-white"
 - Change the structure of \_buttons.scss and made it more easy to be customized
 - Added subtile animation on Tooltips
 - Removed Glyphicons from bootstrap.min.css
 - Update Bootstrap to v3.3.6
 - Change structure of the "Feature with Icon and Title" to "Info Area with Icon and Title" to keep classes consistency with the PRO version. Find more details in on the Upgrading Info below.
 - Update Font Awesome to the latest Version
 - Added animations and transitions vendor prefixes for old browsers on Checkboxes and Radios

### UPGRADING V1.0/V1.0.1 to V1.1.0

1. Buttons:
Please remove all the "btn-raised" classes from all the buttons. Now all the buttons have the "Raised" style on the default state. If you want to use the buttons without that style, like the old "Default" state from the V1.0 please add the class "btn-simple" to those buttons.

2. Features Area:
Please change the all structure:

<div class="feature feature-primary">
    <i class="material-icons">chat</i>
    <h4 class="title">First Feature</h4>
    <p class="description">Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
</div>

with the new one:

<div class="info">
    <div class="icon icon-primary">
        <i class="material-icons">chat</i>
    </div>
    <h4 class="info-title">First Feature</h4>
    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
</div>


## [1.0.1] 21.06.2016 - Bugfixing
 - fixed sidebar in documentation
 - fixed checkboxes and radios on Firefox
 - fixed Dropdown in Navbars for mobile
 - fixed broken link in documentation

IMPORTANT! Before upgrading from V1.0/V1.0.1 to V1.1.0, please read all the change long and then follow the instructions for the upgrade.

## [1.0.0] 15.03.2016
### Original Release
