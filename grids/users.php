<!--SCRIPTS-->
<script src="jqueryui/js/jquery-1.9.1.js"></script>
<script src="jqueryui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/i18n/grid.locale-en.js"></script>
<script src="js/jquery.jqGrid.min.js"></script>
<!--STYLES-->
<link rel="stylesheet" href="jqueryui/css/smoothness/jquery-ui-1.10.3.custom.min.css" />
<link href="css/ui.jqgrid.css" rel="stylesheet" media="screen" />

<?php $gridName = "user"; ?>

<script>

  $(function()
  {
    var gridName = "user";

     function timestampToDateFormatter( cellvalue, options, rowObject )
    {
      var humanDate = new Date(cellvalue * 1000);

      return humanDate.getFullYear() + "-" + (humanDate.getMonth() + 1) + "-" + humanDate.getDate();
    }

    jQuery("#grid_"+gridName+"s").jqGrid(
    {
        url:'grids/'+gridName+'s_xml.php',
        datatype: 'xml',
        mtype: 'GET',
        colNames:
        [
          'ACTION', 
          'ID',
          'NAME',
          'USERNAME',
          'PASSWORD',
          'DATE UPDATED'
        ],
        colModel :
        [ 
          {
            name:'act',
            index:'act', 
            width:2,
            sortable:false, 
            search: false
          },
          {
            name:'id', 
            index:'id', 
            width:2, 
            align:'left', 
            sortable:true, 
            search:true
          },
          {
            name:'name', 
            index:'name', 
            width:3, 
            align:'left', 
            sortable:true, 
            search:true, 
            editable:true,
            editoptions:{size:50}
          },
          {
            name:'username', 
            index:'username', 
            width:3, 
            align:'left', 
            sortable:true, 
            search:true, 
            editable:true,
            editoptions:{size:50},
            editrules: {required:true},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'password', 
            index:'password', 
            width:3, 
            align:'left', 
            sortable:true, 
            search:true, 
            editable:true, 
            edittype:'password',
            editoptions:{size:50},
            editrules: {required:true},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'datetime', 
            index:'datetime,', 
            width:3, 
            align:'left', 
            sortable:true, 
            search:true, 
            formatter: timestampToDateFormatter
          }
        ],
        width: 1100,
        height: 600,
        pager: '#nav_'+gridName+'s',
        rowNum:30,
        rowList:[10,20,30,40,50,100,200,300,400,500],
        sortname: 'id',
        sortorder: 'desc',
        gridComplete: function()
        {
          var ids = jQuery("#grid_users").jqGrid('getDataIDs');
          for(var i=0;i < ids.length;i++)
          {
            var id = ids[i];
            edit = "<button class='ui-state-default ui-corner-all' onclick=\"jQuery('#grid_users').editGridRow('"+id+"'); jQuery('#grid_users').trigger('reloadGrid');\"><span class='ui-icon ui-icon-pencil'></span></button>"; 
            del = "<button class='ui-state-default ui-corner-all' onclick=\"jQuery('#grid_users').delGridRow('"+id+"'); jQuery('#grid_users').trigger('reloadGrid');\"><span class='ui-icon ui-icon-trash'></span></button>";
            jQuery("#grid_"+gridName+"s").jqGrid('setRowData',ids[i],{act:edit+del});
          }
        },
        editurl: "grids/"+gridName+"s_manipulate.php",
        viewrecords: true,
        gridview: true,
        caption: gridName + "s",
        multiselect:true
    });

  $.extend($.jgrid.edit, 
  {
      recreateForm: true,
      width: '500',
      dataheight: '100',
      afterSubmit: function (response, postdata) 
      {
        showToast("done", "success");
      }
  });

  jQuery("#grid_"+gridName+"s").jqGrid('navGrid','#nav_'+gridName+'s',{edit:true, add:true, del:true});

});

</script>

<table id="grid_<?php echo $gridName; ?>s"><tr><td/></tr></table> 
<div id="nav_<?php echo $gridName; ?>s"></div>