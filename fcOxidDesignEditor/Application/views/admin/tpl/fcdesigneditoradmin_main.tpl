[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
    [{else}]
    [{assign var="readonly" value=""}]
    [{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="oxidCopy" value="[{$oxid}]">
    <input type="hidden" name="cl" value="fcDesignEditorAdminController_main">
    <input type="hidden" name="language" value="[{$actlang}]">
</form>

<form enctype="multipart/form-data" name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="fcDesignEditorAdminController_main">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="language" value="[{$actlang}]">


    <table cellspacing="0" cellpadding="0" border="0" width="98%">
        <tr>
            <td width="15"></td>
            <td valign="top" class="edittext">
                <table cellspacing="0" cellpadding="0" border="0">
{*                 <!--   <tr>*}
{*                        <td class="edittext">*}
{*                            [{oxmultilang ident="GENERAL_ACTIVE"}]*}
{*                        </td>*}
{*                        <td class="edittext">*}
{*                            <input class="edittext" type="checkbox" name="themeSettings[logo]" value='1' [{if $edit->fcdesignedit__active->value == 1}]checked[{/if}] [{$readonly}]>*}
{*                            [{oxinputhelp ident="HELP_GENERAL_ACTIVE"}]*}
{*                        </td>*}
{*                    </tr> -->*}
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOTITLE"}]
                        </td>
                        <td class="edittext">
                            <input id="logoText" type="text" class="txt" name="confstrs[sLogoFile]" value="[{$confstrs.sLogoFile}]">
                            [{oxinputhelp ident="HELP_CATEGORY_MAIN_THUMB"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOUPLOAD"}] ([{oxmultilang ident="GENERAL_MAX_FILE_UPLOAD"}] [{$sMaxFormattedFileSize}], [{oxmultilang ident="GENERAL_MAX_PICTURE_DIMENSIONS"}])
                        </td>
                        <td class="edittext" colspan="2">
                            <input id="myFile" class="editinput" name="userfile" type="file"  size="26"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                        </td>
                        <td class="edittext"><br>
                            <input  type="submit" class="edittext" name="save" value="[{oxmultilang ident="GENERAL_SAVE"}]" onClick="Javascript:document.myedit.fnc.value='save'" [{$readonly}]>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
<script>
    document.getElementById("myFile").onchange = uploadOnChange;
    function uploadOnChange() {
        var filename = this.value;
        var lastIndex = filename.lastIndexOf("\\");
        if (lastIndex >= 0) {
            filename = filename.substring(lastIndex + 1);
        }
        document.getElementById("logoText").value = filename;
    }
</script>
[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]
