[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{oxscript include=$oViewConf->getModuleUrl('raforwarding', 'out/admin/src/js/libs/jquery.js') priority=10}]
[{oxscript include=$oViewConf->getModuleUrl('raforwarding', 'out/admin/src/js/widgets/forwarding.js') priority=10}]

<link href="[{$oViewConf->getModuleUrl('raforwarding', 'out/admin/src/css/raforwarding.css')}]" rel="stylesheet" type="text/css">

[{if $readonly}]
[{assign var="readonly" value="readonly disabled"}]
[{else}]
[{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="oxidCopy" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="admin_raforwarding_main">
    <input type="hidden" name="editlanguage" value="[{ $editlanguage }]">
</form>

<form name="myedit" id="myedit" enctype="multipart/form-data" action="[{ $oViewConf->getSelfLink() }]" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="[{$iMaxUploadFileSize}]">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="admin_raforwarding_main">
    <input type="hidden" name="fnc" value="save">
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="voxid" value="[{ $oxid }]">
    <input type="hidden" name="oxparentid" value="[{ $oxparentid }]">
    <input type="hidden" name="editval[raforwarding__oxid]" value="[{ $oxid }]">
    <input type="hidden" name="editval[raforwarding__oxshopid]" value="[{ $oxshopid }]">
    <input type="hidden" name="language" value="[{ $actlang }]">
    <div id="alerts"></div>
    <table id="surveyTable" border="0" width="100%">
        <tr>
            <td valign="top" class="edittext">
                
                [{if $edit neq null}]
                
                    [{if $edit->raforwarding__active->rawValue eq 0}]
                        [{ assign var=activeValue value=no}]
                        [{ else }]
                        [{ assign var=activeValue value=checked}]
                    [{/if}]

                <input type="hidden" name="editval[raforwarding__saveMode]" value="edit">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td class="edittext label">[{ oxmultilang ident="RA_FORWARDING_ADMIN_TITLE" }]</td>
                        <td class="edittext">
                            <input type="text" value="[{ $edit->raforwarding__title }] " 
                                   name="editval[raforwarding__title]"  [{ $readonly }]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext label">[{ oxmultilang ident="RA_FORWARDING_ADMIN_ORIGIN" }]</td>
                        <td class="edittext">
                            <input type="text" value="[{ $edit->raforwarding__origin }]" 
                                   name="editval[raforwarding__origin]"  [{ $readonly }]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext label">[{ oxmultilang ident="RA_FORWARDING_ADMIN_TARGET" }]</td>
                        <td class="edittext">
                            <input type="text" value="[{ $edit->raforwarding__target }]" 
                                  name="editval[raforwarding__target]"  [{ $readonly }]>
                        </td>
                    </tr>
                    [{if $readonly eq null}]
                    <tr>
                        <td class="edittext label">[{ oxmultilang ident="RA_FORWARDING_ADMIN_ACTIVE" }]</td>
                        <td class="edittext">
                            <input type="hidden" name="editval[raforwarding__active]" value="0">
                            <input type="checkbox" name="editval[raforwarding__active]" value="[{ $edit->raforwarding__active }]">
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext"></td>
                        <td class="edittext">
                            <input type="submit" id="saveButton" value=" [{oxmultilang ident="RA_FORWARDING_ADMIN_SUBMIT"}] ">
                        </td>
                    </tr>
                    [{/if}] 
                </table>
                    
                [{else}]

                <input type="hidden" name="editval[raforwarding__saveMode]" value="save">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td class="edittext label">[{ oxmultilang ident="RA_FORWARDING_ADMIN_TITLE" }]</td>
                        <td class="edittext">
                            <input type="text" placeholder="[{ oxmultilang ident="RA_FORWARDING_ADMIN_TITLE" }]" 
                                   id="oLockTarget" name="editval[raforwarding__title]"  [{ $readonly }]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext label">[{ oxmultilang ident="RA_FORWARDING_ADMIN_ORIGIN" }]</td>
                        <td class="edittext">
                            <input type="text" placeholder="[{ oxmultilang ident="RA_FORWARDING_ADMIN_ORIGIN" }]" 
                                   id="oLockTarget" name="editval[raforwarding__origin]"  [{ $readonly }]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext label">[{ oxmultilang ident="RA_FORWARDING_ADMIN_TARGET" }]</td>
                        <td class="edittext">
                            <input type="text" placeholder="[{ oxmultilang ident="RA_FORWARDING_ADMIN_TARGET" }]" 
                                   id="oLockTarget" name="editval[raforwarding__target]"  [{ $readonly }]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext label">[{ oxmultilang ident="RA_FORWARDING_ADMIN_ACTIVE" }]</td>
                        <td class="edittext">
                            <input type="hidden" name="editval[raforwarding__active]" value="0">
                            <input type="checkbox" name="editval[raforwarding__active]" value="1">
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext"></td>
                        <td class="edittext"><input type="submit" id="saveButton" value=" [{oxmultilang ident="RA_FORWARDING_ADMIN_SUBMIT"}] "></td>
                    </tr>
                </table>
                [{/if}]

            </td>
        </tr>
    </table>
</form>

[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]
