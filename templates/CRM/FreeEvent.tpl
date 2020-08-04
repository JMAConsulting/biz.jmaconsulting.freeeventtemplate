<table id="freeEvent" class="form-layout" style="display:none">
    <tbody>
    <tr class="crm-event-manage-fee-form-block-free-event">
        <td class="label">{$form.free_event.label}</td><td class="content">
            {$form.free_event.html}
        </td>
    </tr>
    </tbody>
</table>

{literal}
    <script type="text/javascript">
        CRM.$(function($) {
            $( document ).ajaxComplete(function( event, xhr, settings ) {
                $('#freeEvent').find('tr').insertBefore('tr.crm-event-manage-eventinfo-form-block-is_map');
            });
        });
    </script>
{/literal}