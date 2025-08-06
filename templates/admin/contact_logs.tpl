<div class="contact">
    <{$navigation|default:''|escape}>
    <{if $form|default:''}><{$form}><{/if}>
    <{if $logs|default:''}>
    <div class="pad2">
        <ul>
            <{foreach item=log from=$logs}>
            <li><{$log|escape}></li>
            <{/foreach}>
        </ul>
    </div>
    <{/if}>
</div>
