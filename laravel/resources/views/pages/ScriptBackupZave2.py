frappe.ui.form.on("Item", {
   component_time_at_installation:function(frm){
   var kurang = frm.doc.service_life - frm.doc.component_time_at_installation;
   frm.set_value("opening_stock", kurang );
   console.log(kurang);
   var pengurang = 0;
   var tambah = frm.doc.service_life - frm.doc.component_time_at_installation
 }
});
frappe.ui.form.on("Item", {
   ac_hours_rin_at_installation:function(frm){
   var service_life = frm.doc.service_life;
   var component_time_at_installation = frm.doc.component_time_at_installation;
   var ac_hours_rin_at_installation = frm.doc.ac_hours_rin_at_installation;

   var calculate = parseInt(service_life) - parseInt(component_time_at_installation) + parseInt(ac_hours_rin_at_installation);
   frm.set_value("due_at_hours", calculate );
   console.log(calculate);
   var pengurang_2 = 0;
   var calculate_due = frm.doc.service_life - frm.doc.component_time_at_installation + frm.ac_hours_rin_at_installation
 }
});
frappe.ui.form.on("Item", {
   onload:function(frm){
   var limit_warning = frm.doc.limit_warning;
   var due_at_hours = frm.doc.due_at_hours;
   var status = frm.doc.status;

      frappe.call({
        method:"frappe.client.get",
        args: {
          doctype:"Bin",
          filters: {
              'item_code': frm.doc.item_code,
              'warehouse': 'Halim Perdanakusuma - ZU'
          },
        },
        callback: function(r) {
          frm.set_value("status");
          if (r.message["actual_qty"] > frm.doc.limit_warning){
      frm.set_value("status","Safe");
          }else if (r.message["actual_qty"] == frm.doc.limit_warning){
      frm.set_value("status","Warning");
          }else if (r.message["actual_qty"] < frm.doc.limit_warning){
      frm.set_value("status","Alert");
          }else if (r.message["actual_qty"] < frm.doc.due_at_hours){
      frm.set_value("status","Alert");
          }
        }
      });
   }
});
frappe.ui.form.on("Item", {
   onload:function(frm){
      frappe.call({
        method:"frappe.client.get",
        args: {
          doctype:"Stock Ledger Entry",
          filters: {
              'item_code': frm.doc.item_code,
          },
        },
        callback: function(r) {
          frm.set_value("actual_qty_after_transaction", r.message["qty_after_transaction"]);
        }
      });
   }
});
