<!--SCRIPTS-->
<script src="jqueryui/js/jquery-1.9.1.js"></script>
<script src="jqueryui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/i18n/grid.locale-en.js"></script>
<script src="js/jquery.jqGrid.min.js"></script>
<!--STYLES-->
<link rel="stylesheet" href="jqueryui/css/smoothness/jquery-ui-1.10.3.custom.min.css" />
<link href="css/ui.jqgrid.css" rel="stylesheet" media="screen" />

<?php $gridName = "student"; ?>

<script>

  $(function()
  {
    var gridName = "student";

    var requestDoneOptions = 
    {
        keys: true,
        oneditfunc: function (rowid) 
        {
            alert("row with rowid=" + rowid + " is editing.");
        },
        aftersavefunc: function (rowid, response, options) 
        {
            alert("row with rowid=" + rowid + " is successfuly modified.");
        }
    };

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
          'STUDENTID',
          // ---------------------------------------------------------------------- //
          'FIRST NAME',
          'LAST NAME',
          'MIDDLE NAME',
          'ADDRESS',
          'FATHER',
          'MOTHER',
          'GUARDIAN',
          'GENDER',
          'CIVIL STATUS',
          'CITIZENSHIP',
          'BIRTHDAY',
          'EMAIL',
          'CONTACT #1',
          'CONTACT #2',
          'CONTACT #3',
          'EMERGENCY CONTACT PERSON',
          // ---------------------------------------------------------------------- //
          'SCHOOL NAME',
          'SCHOOL YEAR',
          'PROGRAM',
          // ---------------------------------------------------------------------- //
          'TUITION FEE FOR',
          'PROGRAM / COURSE',
          'OTHERS',
          // ---------------------------------------------------------------------- //
          'FIRST',
          'SECOND',
          'THIRD',
          // ---------------------------------------------------------------------- //
          'TV',
          'RADIO',
          'PRINT',
          'WEBSITE',
          'SEMINAR',
          'CAREER FACTOR',
          'EVENT',
          'FLYERS',
          'BILLBOARDS',
          'POSTERS',
          'STIMULI',
          'REFERRALS',
          'OTHERS',
          // ---------------------------------------------------------------------- //
          'STATUS',
          'PROGRAM',
          'SCHEDULE',
          'PAYMENT',
          'STUDENT CONTACT NUMBER',
          // ---------------------------------------------------------------------- //
          'VIST SCHEDULE',
          'VISIT PURPOSE',
          'OFFICER',
          // ---------------------------------------------------------------------- //
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
            name:'studentid', 
            index:'studentid', 
            width:3, 
            align:'left', 
            sortable:true, 
            search:true, 
            editable:true,
            editoptions:{size:50},
            editrules: {required:true},
            formoptions: { elmsuffix: ' * required' }
          },
          // ---------------------------------------------------------------------- //
          {
            name:'a_firstname', 
            index:'a_firstname', 
            width:3, align:'left',
            sortable:false, 
            search:false, 
            editable:true,
            editoptions:{size:50},
            editrules: {required:true},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_lastname', 
            index:'a_lastname', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editoptions:{size:50},
            editrules: {required:true},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_middlename',
            index:'a_middlename', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editoptions:{size:50},
            editrules: {required:true},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_address',
            index:'a_address', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            edittype:'textarea', 
            editoptions:{rows:"2",cols:"47"},
            hidden:true,
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_father',
            index:'a_father', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            hidden:true,
            editoptions:{size:50},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_mother',
            index:'a_mother', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            hidden:true,
            editoptions:{size:50},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_guardian',
            index:'a_guardian', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            hidden:true,
            editoptions:{size:50},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_gender',
            index:'a_gender', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            hidden:true,
            edittype:'select', 
            editoptions:{value:{1:'Male', 2:'Female'}},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_civilstatus',
            index:'a_civilstatus', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            hidden:true,
            edittype:'select', 
            editoptions:{value:{1:'Single', 2:'Maried'}},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_citizenship',
            index:'a_citizenship', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            hidden:true,
            editoptions:{size:50},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_birthday',
            index:'a_birthday', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true, date:true},
            hidden:true,
            formoptions: { elmsuffix: ' * required' },
            formatter: timestampToDateFormatter,
            editoptions: 
            {
              dataInit: function(el)
              { 
                $(el).datepicker({dateFormat:'yy-mm-dd'}); 
              },
              size: 50
            }
          },
          {
            name:'a_email',
            index:'a_email', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true, email:true},
            hidden:true,
            editoptions:{size:50},
            formoptions: { elmsuffix: ' * required' }
          },
          {
            name:'a_contactnumber1',
            index:'a_contactnumber1', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, number:true},
            hidden:true,
            editoptions:{size:50},
          },
          {
            name:'a_contactnumber2',
            index:'a_contactnumber2', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, number:true},
            hidden:true,
            editoptions:{size:50},
          },
          {
            name:'a_contactnumber3',
            index:'a_contactnumber3', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, number:true},
            hidden:true,
            editoptions:{size:50},
          },
          {
            name:'a_emergencycontactperson',
            index:'a_emergencycontactperson', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            editoptions:{size:50},
          },
          // ---------------------------------------------------------------------- //
          {
            name:'b_schoolname',
            index:'b_schoolname', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            hidden:true,
            editoptions:{size:50},
            formoptions: { elmsuffix: ' * required' }
          },
           {
            name:'b_schoolyear',
            index:'b_schoolyear', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            hidden:true,
            editoptions:{size:50},
            formoptions: { elmsuffix: ' * required' }
          },
           {
            name:'b_program',
            index:'b_program', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, required:true},
            hidden:true,
            edittype: "select",
            editoptions:{value:{1:'BSIT', 2:'BSCS', 3:'DCET', 4:'BSAT'}},
            formoptions: { elmsuffix: ' * required' }
          },
          // ---------------------------------------------------------------------- //
           {
            name:'c_tuition',
            index:'c_tuition', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            editoptions:{size:50},
          },
           {
            name:'c_program',
            index:'c_program', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype: "select",
            editoptions:{value:{1:'BSIT', 2:'BSCS', 3:'DCET', 4:'BSAT'}},
          },
          {
            name:'c_others',
            index:'c_others', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            edittype:'textarea', 
            editoptions:{rows:"2",cols:"47"},
            hidden:true
          },
          // ---------------------------------------------------------------------- //
           {
            name:'d_first',
            index:'d_first', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            editoptions:{size:50},
          },
           {
            name:'d_second',
            index:'d_second', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            editoptions:{size:50},
          },
           {
            name:'d_third',
            index:'d_third', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            editoptions:{size:50},
          },
          // ---------------------------------------------------------------------- //
           {
            name:'e_tv',
            index:'e_tv', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
          {
            name:'e_radio',
            index:'e_radio', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
           {
            name:'e_print',
            index:'e_print', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
           {
            name:'e_website',
            index:'e_website', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
           {
            name:'e_seminar',
            index:'e_seminar', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
           {
            name:'e_careerfactor',
            index:'e_careerfactor', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
          {
            name:'e_event',
            index:'e_event', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
          {
            name:'e_flyers',
            index:'e_flyers', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
          {
            name:'e_billboards',
            index:'e_billboards', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
          {
            name:'e_posters',
            index:'e_posters', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
          {
            name:'e_stimuli',
            index:'e_stimuli', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
          {
            name:'e_referrals',
            index:'e_referrals', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype:'checkbox', 
            editoptions:{value:"1:0"},
          },
          {
            name:'e_others',
            index:'e_others', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            edittype:'textarea', 
            editoptions:{rows:"2",cols:"47"},
            hidden:true
          },
          // ---------------------------------------------------------------------- //
          {
            name:'f_status',
            index:'f_status', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true, 
            edittype: "select",
            editoptions:{value:{1:'Freshman', 2:'Registered', 3:'Transferee', 4:'Enrolled'}},
          },
          {
            name:'f_program',
            index:'f_program', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            edittype: "select",
            editoptions:{value:{1:'BSIT', 2:'BSCS', 3:'DCET', 4:'BSAT'}},
          },
          {
            name:'f_schedule',
            index:'f_schedule', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true, 
            edittype: "select",
            editoptions:{value:{1:'Morning', 2:'Afternoon', 3:'Evening'}},
          },
          {
            name:'f_payment',
            index:'f_payment', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true, 
            edittype: "select",
            editoptions:{value:{1:'Cash', 2:'Installment'}},
          },
          {
            name:'f_studentcontactnumber',
            index:'f_studentcontactnumber', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true, number:true},
            hidden:true,
            editoptions:{size:50},
          },
          // ---------------------------------------------------------------------- //
          {
            name:'g_visitschedule',
            index:'g_visitschedule', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            formatter: timestampToDateFormatter,
            editoptions: 
            {
              dataInit: function(el)
              { 
                $(el).datepicker({dateFormat:'yy-mm-dd'}); 
              },
              size: 50
            }
          },
          {
            name:'g_visitpurpose',
            index:'g_visitpurpose', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true}, 
            edittype: "select",
            editoptions:{value:{1:'To Enroll', 2:'Submit Requirements', 3:'Campus Tour', 4:'Take Scholarship Exam'}},
            hidden:true
          },
          {
            name:'g_officer',
            index:'g_officer', 
            width:3, 
            align:'left', 
            sortable:false, 
            search:false, 
            editable:true,
            editrules: {edithidden:true},
            hidden:true,
            editoptions:{size:50},
          },
          // ---------------------------------------------------------------------- //
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
        rowNum: 30,
        rowList:[10,20,30,40,50,100,200,300,400,500],
        sortname: 'id',
        sortorder: 'desc',
        editurl: "grids/"+gridName+"s_manipulate.php",
        viewrecords: true,
        gridview: true,
        multiselect:true,
        ignoreCase: true,
        gridComplete: function()
        {
          var ids = jQuery("#grid_students").jqGrid('getDataIDs');

          for(var i = 0; i < ids.length; i++)
          {
            var id = ids[i];
            edit = "<button class='ui-state-default ui-corner-all' onclick=\"jQuery('#grid_students').editGridRow('"+id+"', {width:800, dataheight: 500}); jQuery('#grid_students').trigger('reloadGrid');\"><span class='ui-icon ui-icon-pencil'></span></button>"; 
            del = "<button class='ui-state-default ui-corner-all' onclick=\"jQuery('#grid_students').delGridRow('"+id+"'); jQuery('#grid_students').trigger('reloadGrid');\"><span class='ui-icon ui-icon-trash'></span></button>";
            jQuery("#grid_"+gridName+"s").jqGrid('setRowData',ids[i],{act:edit+del});
          }
        }
    });

 $.extend($.jgrid.edit, 
  {
      recreateForm: true,
      width: '800',
      datawidth: 'auto',
      height: 'auto',
      dataheight: '500',
      afterSubmit: function (response, postdata) 
      {
        showToast("done", "success");
      },
      beforeShowForm: function($form) 
      {
        $("#editmodgrid_students").css("width:auto");

        $('<tr class="FormData"><td class="CaptionTD ui-widget-content" colspan="2">' +
             '<hr/><div style="padding:3px" class="ui-widget-header ui-corner-all">' +
             '<b>Personal Information:</b></div></td></tr>')
             .insertBefore('#tr_a_firstname');

        $('<tr class="FormData"><td class="CaptionTD ui-widget-content" colspan="2">' +
             '<hr/><div style="padding:3px" class="ui-widget-header ui-corner-all">' +
             '<b>Schools Last Attended:</b></div></td></tr>')
             .insertBefore('#tr_b_schoolname');

        $('<tr class="FormData"><td class="CaptionTD ui-widget-content" colspan="2">' +
             '<hr/><div style="padding:3px" class="ui-widget-header ui-corner-all">' +
             '<b>Inquiry:</b></div></td></tr>')
             .insertBefore('#tr_c_tuition');

        $('<tr class="FormData"><td class="CaptionTD ui-widget-content" colspan="2">' +
             '<hr/><div style="padding:3px" class="ui-widget-header ui-corner-all">' +
             '<b>Other Schools Considered:</b></div></td></tr>')
             .insertBefore('#tr_d_first');

        $('<tr class="FormData"><td class="CaptionTD ui-widget-content" colspan="2">' +
             '<hr/><div style="padding:3px" class="ui-widget-header ui-corner-all">' +
             '<b>How did you find out about STI:</b></div></td></tr>')
             .insertBefore('#tr_e_tv');

        $('<tr class="FormData"><td class="CaptionTD ui-widget-content" colspan="2">' +
             '<hr/><div style="padding:3px" class="ui-widget-header ui-corner-all">' +
             '<b>Enrollment Details:</b></div></td></tr>')
             .insertBefore('#tr_f_status');

        $('<tr class="FormData"><td class="CaptionTD ui-widget-content" colspan="2">' +
             '<hr/><div style="padding:3px" class="ui-widget-header ui-corner-all">' +
             '<b>Appointment Details:</b></div></td></tr>')
             .insertBefore('#tr_g_visitschedule');
      }
  });

  jQuery("#grid_"+gridName+"s").jqGrid('navGrid','#nav_'+gridName+'s',{edit:true, add:true, del:true});

});

</script>

<table id="grid_<?php echo $gridName; ?>s"><tr><td/></tr></table> 
<div id="nav_<?php echo $gridName; ?>s"></div>