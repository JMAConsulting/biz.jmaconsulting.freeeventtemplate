{if $freeEvent}
{literal}
<script type="text/javascript">
CRM.$(function($) {
    $('._of_children_with_asd_attending-content').append('$ 0.00');
    $('._of_parents_guardians_caregivers-content').append('$ 0.00');
    $('._siblings-content span.price-field-amount').html('$ 0.00');
    $('._of_professionals-content span.price-field-amount').html('$ 0.00');
    $('._of_volunteers-content span.price-field-amount').html('$ 0.00');
});
</script>
{/literal}
{/if}
