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
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOTITLE"}]
                        </td>
                        <td class="edittext">
                            <input id="headerText" type="text" class="txt" name="confstrs[sLogoFile]" value="[{$confstrs.sLogoFile}]" >
                            [{oxinputhelp ident="FCDESIGNEDITOR_MAIN_LOGOTITLE_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOTITLEUPLOAD"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input id="headerUpload" class="editinput" name="logotitleupload" type="file"  size="26" />
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOEMAIL"}]
                        </td>
                        <td class="edittext">
                            <input id="emailText" type="text" class="txt" name="confstrs[sEmailLogo]" value="[{$confstrs.sEmailLogo}]">
                            [{oxinputhelp ident="FCDESIGNEDITOR_MAIN_LOGOEMAIL_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOEMAILUPLOAD"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input id="emailUpload" class="editinput" name="logoemailupload" type="file"  size="26" />
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOHEIGHT"}]
                        </td>
                        <td class="edittext">
                            <input id="emailText" type="text" class="txt" name="confstrs[sLogoHeight]" value="[{$confstrs.sLogoHeight}]">
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_LOGOWIDTH"}]
                        </td>
                        <td class="edittext">
                            <input id="emailText" type="text" class="txt" name="confstrs[sLogoWidth]" value="[{$confstrs.sLogoWidth}]">
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_FAVICONTITLE"}]
                        </td>
                        <td class="edittext">
                            <input id="faviconText" type="text" class="txt" name="confstrs[sFaviconFile]" value="[{$confstrs.sFaviconFile}]">
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="FCDESIGNEDITOR_MAIN_FAVICONUPLOAD"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input id="faviconUpload" class="editinput" name="faviconupload" type="file"  size="26" />
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
    document.getElementById("headerUpload").onchange = fcHeader;
    document.getElementById("emailUpload").onchange = fcEmail;
    document.getElementById("faviconUpload").onchange = fcFavicon;
    function fcHeader() { uploadOnChange("headerText",this.value)}
    function fcEmail() { uploadOnChange("emailText",this.value)}
    function fcFavicon() { uploadOnChange("faviconText",this.value)}
    function uploadOnChange(textfield,filename) {
        var lastIndex = filename.lastIndexOf("\\");
        if (lastIndex >= 0) {
            filename = filename.substring(lastIndex + 1);
        }
        document.getElementById(textfield).value = filename;
    }
</script>
[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]
