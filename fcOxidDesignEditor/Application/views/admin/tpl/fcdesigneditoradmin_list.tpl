[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]
[{assign var="where" value=$oView->getListFilter()}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
    [{else}]
    [{assign var="readonly" value=""}]
    [{/if}]

<script type="text/javascript">
    <!--
    window.onload = function ()
    {
        top.reloadEditFrame();
        [{if $updatelist == 1}]
        top.oxid.admin.updateList('[{$oxid}]');
        [{/if}]
    };
    -->
</script>
<!--{* <div id="liste">*}
{*    <form name="search" id="search" action="[{$oViewConf->getSelfLink()}]" method="post">*}
{*        [{include file="_formparams.tpl" cl="fcSupportAdminController_list" lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]*}
{*        <table cellspacing="0" cellpadding="0" border="0" width="100%">*}
{*            <colspan>*}
{*                <col width="2%">*}
{*                <col width="2%">*}
{*                <col width="60%">*}
{*                <col width="25%">*}
{*            </colspan>*}
{*            <tr class="listitem">*}
{*                <td valign="top" class="listfilter first" align="right">*}
{*                    <div class="r1"><div class="b1"><select name="changelang" class="editinput" onChange="Javascript:top.oxid.admin.changeLanguage();">*}
{*                                [{foreach from=$languages item=lang}]*}
{*                                <option value="[{$lang->id}]" [{if $lang->selected}]SELECTED[{/if}]>[{$lang->name}]</option>*}
{*                                [{/foreach}]*}
{*                            </select>&nbsp;</div></div>*}

{*                </td>*}
{*                <td valign="top" class="listfilter" height="20">*}
{*                    <div class="r1"><div class="b1">&nbsp;</div></div>*}
{*                </td>*}
{*                <td valign="top" class="listfilter" height="20" colspan="1">*}
{*                    <div class="r1"><div class="b1">*}
{*                            <input class="listedit" type="text" size="50" maxlength="128" placeholder="search" name="where[fcsupportform_plugins][oxtitle]" value="[{$where.fcsupportform_plugins.oxtitle}]">*}
{*                        </div></div>*}
{*                </td>*}
{*                <td valign="top" class="listfilter" height="20" colspan="1">*}
{*                    <div class="r1"><div class="b1">*}
{*                            <div class="find">*}
{*                                <input class="listedit" type="submit" name="submitit" value="" onClick="Javascript:document.search.lstrt.value=0;">*}
{*                            </div>*}
{*                            <input style="max-width: 88%;" class="listedit" type="text" size="50" maxlength="128" placeholder="search" name="where[fcsupportform_plugins][oxartnum]" value="[{$where.fcsupportform_plugins.oxartnum}]">*}
{*                        </div></div>*}
{*                </td>*}
{*            </tr>*}
{*            <tr>*}
{*                <td class="listheader first" height="15" width="30" align="center"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'fcsupportform_plugins', 'oxactive', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="FCSUPPORTFORM_ADMIN_LIST_ACTIVE"}]</a></td>*}
{*                <td class="listheader first" height="15" width="30" align="center"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'fcsupportform_plugins', 'oxisactiveinshop', 'desc');document.search.submit();" class="listheader">[{oxmultilang ident="FCSUPPORTFORM_ADMIN_LIST_ACTIVE_INSHOP"}]</a></td>*}
{*                <td class="listheader" height="15" colspan="1">&nbsp;<a href="Javascript:top.oxid.admin.setSorting( document.search, 'fcsupportform_plugins', 'oxtitle', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="FCSUPPORTFORM_ADMIN_LIST_TITLE"}]</a></td>*}
{*                <td class="listheader" height="15" colspan="1">&nbsp;<a href="Javascript:top.oxid.admin.setSorting( document.search, 'fcsupportform_plugins', 'oxartnum', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="FCSUPPORTFORM_ADMIN_LIST_ARTNUM"}]</a></td>*}
{*            </tr>*}

{*            [{assign var="blWhite" value=""}]*}
{*            [{assign var="_cnt" value=0}]*}
{*            [{foreach from=$mylist item=listitem}]*}
{*            [{assign var="_cnt" value=$_cnt+1}]*}
{*            <tr id="row.[{$_cnt}]">*}

{*                [{if $listitem->blacklist == 1}]*}
{*                [{assign var="listclass" value=listitem3}]*}
{*                [{else}]*}
{*                [{assign var="listclass" value=listitem$blWhite}]*}
{*                [{/if}]*}
{*                [{if $listitem->getId() == $oxid}]*}
{*                [{assign var="listclass" value=listitem4}]*}
{*                [{/if}]*}
{*                <td valign="top" class="[{$listclass}][{if $listitem->fcsupportform_plugins__oxactive->value == 1}] active[{/if}]" height="15"><div class="listitemfloating">&nbsp</a></div></td>*}
{*                <td valign="top" class="[{$listclass}][{if $listitem->fcsupportform_plugins__oxisactiveinshop->value == 1}] active[{/if}]" height="15"><div class="listitemfloating">&nbsp</a></div></td>*}
{*                <td valign="top" class="[{$listclass}]" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:top.oxid.admin.editThis('[{$listitem->fcsupportform_plugins__oxid->value}]');" class="[{$listclass}]">[{$listitem->fcsupportform_plugins__oxtitle->value}]</a></div></td>*}
{*                <td valign="top" class="[{$listclass}]" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:top.oxid.admin.editThis('[{$listitem->fcsupportform_plugins__oxid->value}]');" class="[{$listclass}]">[{$listitem->fcsupportform_plugins__oxartnum->value}]</a>[{if $listitem->fcsupportform_plugins__oxobjectid->value == null}]<a href="Javascript:top.oxid.admin.deleteThis('[{$listitem->fcsupportform_plugins__oxid->value}]');" class="delete" id="del.[{$_cnt}]"title="" [{include file="help.tpl" helpid=item_delete}]></a>[{/if}]</div></td>*}

{*            </tr>*}
{*            [{if $blWhite == "2"}]*}
{*            [{assign var="blWhite" value=""}]*}
{*            [{else}]*}
{*            [{assign var="blWhite" value="2"}]*}
{*            [{/if}]*}
{*            [{/foreach}]*}
{*            [{include file="pagenavisnippet.tpl" colspan="4"}]*}
{*        </table>*}
{*    </form>*}
{*</div>         *}-->

[{include file="pagetabsnippet.tpl"}]

<script type="text/javascript">
    if (parent.parent)
    {   parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem    = "[{oxmultilang ident="DELIVERY_LIST_MENUITEM"}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident="DELIVERY_LIST_MENUSUBITEM"}]";
        parent.parent.sWorkArea    = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>
</body>
</html>

