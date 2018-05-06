{% set disabled="ui-state-disabled" %}
{% set disabledurl='javascript:void(0)' %}
<div id="mypagers">
    <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
        <div class="dataTables_filter" id="DataTables_Table_0_filter"></div>
        <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">
            <a tabindex="0" href="{% if first==0  %}{{ disabledurl }}{% else %}{{ url }}{{ first }}{% endif %}" class="first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default {% if first==0  %}{{ disabled }}{% endif %}" id="DataTables_Table_0_first">第1页</a>
            <a tabindex="0" href="{% if pre==0  %}{{ disabledurl }}{% else %}{{ url }}{{ pre }}{% endif %}" class="previous fg-button ui-button ui-state-default {%  if pre==0 %}{{ disabled }}{% endif %}" id="DataTables_Table_0_previous">上页</a><span>
                {% set i=0 %}
                {% for p in pager %}
                    {% if i==0  %}
                        <a href="javascript:void(0)" tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled">{{ p[0] }}</a>
                        {% else %}
                        <a href="{{ url }}{{ p[1] }}" tabindex="0" class="fg-button ui-button ui-state-default">{{ p[0] }}</a>
                    {% endif  %}
                    {% set i=i+1 %}
            {% endfor %}
            </span>
            <a tabindex="0" href="{% if next==0  %}{{ disabledurl }}{% else %}{{ url }}{{ next }}{% endif %}" class="next fg-button ui-button ui-state-default {%  if next==0 %}{{ disabled }}{% endif %}" id="DataTables_Table_0_next" >下页</a>
            <a tabindex="0" href="{% if last==0  %}{{ disabledurl }}{% else %}{{ url }}{{ last }}{% endif %}" class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default  {%  if last==0 %}{{ disabled }}{% endif %} " id="DataTables_Table_0_last" >最后</a>
        </div>
    </div>
</div>