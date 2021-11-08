[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
    [{else}]
    [{assign var="readonly" value=""}]
    [{/if}]


//todo get this Hidden setup working

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="oxidCopy" value="[{$oxid}]">
    <input type="hidden" name="cl" value="fcSupportAdminController_main">
    <input type="hidden" name="language" value="[{$actlang}]">
</form>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="editval[fcsupportform_plugins__oxid]" value="[{$oxid}]">
    <input type="hidden" name="language" value="[{$actlang}]">


    //Todo  Do the EDITVALS FINALLY
    <table cellspacing="0" cellpadding="0" border="0" width="98%">
        <tr>
            <td width="15"></td>
            <td valign="top" class="edittext">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="GENERAL_ACTIVE"}]
                        </td>
                        <td class="edittext">
                            <input class="edittext" type="checkbox" name="editval[fc]" value='1' [{if $edit->fcsupportform_plugins__oxactive->value == 1}]checked[{/if}] [{$readonly}]>
                            [{oxinputhelp ident="HELP_GENERAL_ACTIVE"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOTITLE"}]
                        </td>
                        <td class="edittext">
                            <input id="oxthumb" type="text" class="editinput" size="30" maxlength="[{$edit->oxcategories__oxthumb->fldmax_length}]" name="editval[fcdesignedit__]" value="[{$edit->oxcategories__oxthumb->value}]">
                            [{oxinputhelp ident="HELP_CATEGORY_MAIN_THUMB"}]
                            [{if (!($edit->oxcategories__oxthumb->value=="nopic.jpg" || $edit->oxcategories__oxthumb->value=="" || $edit->oxcategories__oxthumb->value=="nopic_ico.jpg"))}]
                        </td>
                        <td class="edittext">
                            <a href="Javascript:DeletePic('oxthumb');" class="delete left" [{include file="help.tpl" helpid=item_delete}]></a>
                            [{/if}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOUPLOAD"}] ([{oxmultilang ident="GENERAL_MAX_FILE_UPLOAD"}] [{$sMaxFormattedFileSize}], [{oxmultilang ident="GENERAL_MAX_PICTURE_DIMENSIONS"}])
                        </td>
                        <td class="edittext" colspan="2">
                            <input class="editinput" name="myfile[TC@fcdesignedit__oxvalue]" type="file"  size="26" [{$readonly}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                        </td>
                        <td class="edittext"><br>
                            <input type="submit" class="edittext" name="save" value="[{oxmultilang ident="GENERAL_SAVE"}]" onClick="Javascript:document.myedit.fnc.value='save'" [{$readonly}]>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]    
