﻿/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function(){function a(m,n){if(CKEDITOR.env.ie)m.removeAttribute(n);else delete m[n];};var b=/^(?:td|th)$/;function c(m){var n=m.createBookmarks(),o=m.getRanges(),p=[],q={};function r(z){if(p.length>0)return;if(z.type==CKEDITOR.NODE_ELEMENT&&b.test(z.getName())&&!z.getCustomData('selected_cell')){CKEDITOR.dom.element.setMarker(q,z,'selected_cell',true);p.push(z);}};for(var s=0;s<o.length;s++){var t=o[s];if(t.collapsed){var u=t.getCommonAncestor(),v=u.getAscendant('td',true)||u.getAscendant('th',true);if(v)p.push(v);}else{var w=new CKEDITOR.dom.walker(t),x;w.guard=r;while(x=w.next()){var y=x.getParent();if(y&&b.test(y.getName())&&!y.getCustomData('selected_cell')){CKEDITOR.dom.element.setMarker(q,y,'selected_cell',true);p.push(y);}}}}CKEDITOR.dom.element.clearAllMarkers(q);m.selectBookmarks(n);return p;};function d(m){var n=new CKEDITOR.dom.element(m),o=(n.getName()=='table'?m:n.getAscendant('table')).$,p=o.rows,q=-1,r=[];for(var s=0;s<p.length;s++){q++;if(!r[q])r[q]=[];var t=-1;for(var u=0;u<p[s].cells.length;u++){var v=p[s].cells[u];t++;while(r[q][t])t++;var w=isNaN(v.colSpan)?1:v.colSpan,x=isNaN(v.rowSpan)?1:v.rowSpan;for(var y=0;y<x;y++){if(!r[q+y])r[q+y]=[];for(var z=0;z<w;z++)r[q+y][t+z]=p[s].cells[u];}t+=w-1;}}return r;};function e(m,n){var o=CKEDITOR.env.ie?'_cke_rowspan':'rowSpan';for(var p=0;p<m.length;p++)for(var q=0;q<m[p].length;q++){var r=m[p][q];if(r.parentNode)r.parentNode.removeChild(r);r.colSpan=r[o]=1;}var s=0;for(p=0;p<m.length;p++)for(q=0;q<m[p].length;q++){r=m[p][q];if(!r)continue;if(q>s)s=q;if(r._cke_colScanned)continue;if(m[p][q-1]==r)r.colSpan++;if(m[p][q+1]!=r)r._cke_colScanned=1;}for(p=0;p<=s;p++)for(q=0;q<m.length;q++){if(!m[q])continue;r=m[q][p];if(!r||r._cke_rowScanned)continue;if(m[q-1]&&m[q-1][p]==r)r[o]++;if(!m[q+1]||m[q+1][p]!=r)r._cke_rowScanned=1;}for(p=0;p<m.length;p++)for(q=0;q<m[p].length;q++){r=m[p][q];a(r,'_cke_colScanned');a(r,'_cke_rowScanned');}for(p=0;p<m.length;p++){var t=n.ownerDocument.createElement('tr');for(q=0;q<m[p].length;){r=m[p][q];if(m[p-1]&&m[p-1][q]==r){q+=r.colSpan;continue;}t.appendChild(r);if(o!='rowSpan'){r.rowSpan=r[o];r.removeAttribute(o);}q+=r.colSpan;if(r.colSpan==1)r.removeAttribute('colSpan');if(r.rowSpan==1)r.removeAttribute('rowSpan');}if(CKEDITOR.env.ie)n.rows[p].replaceNode(t);else{var u=new CKEDITOR.dom.element(n.rows[p]),v=new CKEDITOR.dom.element(t);u.setHtml('');v.moveChildren(u);}}};function f(m){var n=m.cells;for(var o=0;o<n.length;o++){n[o].innerHTML='';if(!CKEDITOR.env.ie)new CKEDITOR.dom.element(n[o]).appendBogus();
}};function g(m,n){var o=m.getStartElement().getAscendant('tr');if(!o)return;var p=o.clone(true);p.insertBefore(o);f(n?p.$:o.$);};function h(m){if(m instanceof CKEDITOR.dom.selection){var n=c(m),o=[];for(var p=0;p<n.length;p++){var q=n[p].getParent();o[q.$.rowIndex]=q;}for(p=o.length;p>=0;p--)if(o[p])h(o[p]);}else if(m instanceof CKEDITOR.dom.element){var r=m.getAscendant('table');if(r.$.rows.length==1)r.remove();else m.remove();}};function i(m,n){var o=m.getStartElement(),p=o.getAscendant('td',true)||o.getAscendant('th',true);if(!p)return;var q=p.getAscendant('table'),r=p.$.cellIndex;for(var s=0;s<q.$.rows.length;s++){var t=q.$.rows[s];if(t.cells.length<r+1)continue;p=new CKEDITOR.dom.element(t.cells[r].cloneNode(false));if(!CKEDITOR.env.ie)p.appendBogus();var u=new CKEDITOR.dom.element(t.cells[r]);if(n)p.insertBefore(u);else p.insertAfter(u);}};function j(m){if(m instanceof CKEDITOR.dom.selection){var n=c(m);for(var o=n.length;o>=0;o--)if(n[o])j(n[o]);}else if(m instanceof CKEDITOR.dom.element){var p=m.getAscendant('table'),q=m.$.cellIndex;for(o=p.$.rows.length-1;o>=0;o--){var r=new CKEDITOR.dom.element(p.$.rows[o]);if(!q&&r.$.cells.length==1){h(r);continue;}if(r.$.cells[q])r.$.removeChild(r.$.cells[q]);}}};function k(m,n){var o=m.getStartElement(),p=o.getAscendant('td',true)||o.getAscendant('th',true);if(!p)return;var q=p.clone();if(!CKEDITOR.env.ie)q.appendBogus();if(n)q.insertBefore(p);else q.insertAfter(p);};function l(m){if(m instanceof CKEDITOR.dom.selection){var n=c(m);for(var o=n.length-1;o>=0;o--)l(n[o]);}else if(m instanceof CKEDITOR.dom.element)if(m.getParent().getChildCount()==1)m.getParent().remove();else m.remove();};CKEDITOR.plugins.add('tabletools',{init:function(m){var n=m.lang.table;m.addCommand('cellProperties',new CKEDITOR.dialogCommand('cellProperties'));CKEDITOR.dialog.add('cellProperties',this.path+'dialogs/tableCell.js');m.addCommand('tableDelete',{exec:function(o){var p=o.getSelection(),q=p&&p.getStartElement(),r=q&&q.getAscendant('table',true);if(!r)return;p.selectElement(r);var s=p.getRanges()[0];s.collapse();p.selectRanges([s]);if(r.getParent().getChildCount()==1)r.getParent().remove();else r.remove();}});m.addCommand('rowDelete',{exec:function(o){var p=o.getSelection();h(p);}});m.addCommand('rowInsertBefore',{exec:function(o){var p=o.getSelection();g(p,true);}});m.addCommand('rowInsertAfter',{exec:function(o){var p=o.getSelection();g(p);}});m.addCommand('columnDelete',{exec:function(o){var p=o.getSelection();j(p);}});m.addCommand('columnInsertBefore',{exec:function(o){var p=o.getSelection();
i(p,true);}});m.addCommand('columnInsertAfter',{exec:function(o){var p=o.getSelection();i(p);}});m.addCommand('cellDelete',{exec:function(o){var p=o.getSelection();l(p);}});m.addCommand('cellInsertBefore',{exec:function(o){var p=o.getSelection();k(p,true);}});m.addCommand('cellInsertAfter',{exec:function(o){var p=o.getSelection();k(p);}});if(m.addMenuItems)m.addMenuItems({tablecell:{label:n.cell.menu,group:'tablecell',order:1,getItems:function(){var o=c(m.getSelection());return{tablecell_insertBefore:CKEDITOR.TRISTATE_OFF,tablecell_insertAfter:CKEDITOR.TRISTATE_OFF,tablecell_delete:CKEDITOR.TRISTATE_OFF,tablecell_properties:o.length==1?CKEDITOR.TRISTATE_OFF:CKEDITOR.TRISTATE_DISABLED};}},tablecell_insertBefore:{label:n.cell.insertBefore,group:'tablecell',command:'cellInsertBefore',order:5},tablecell_insertAfter:{label:n.cell.insertAfter,group:'tablecell',command:'cellInsertAfter',order:10},tablecell_delete:{label:n.cell.deleteCell,group:'tablecell',command:'cellDelete',order:15},tablecell_properties:{label:n.cell.title,group:'tablecellproperties',command:'cellProperties',order:20},tablerow:{label:n.row.menu,group:'tablerow',order:1,getItems:function(){return{tablerow_insertBefore:CKEDITOR.TRISTATE_OFF,tablerow_insertAfter:CKEDITOR.TRISTATE_OFF,tablerow_delete:CKEDITOR.TRISTATE_OFF};}},tablerow_insertBefore:{label:n.row.insertBefore,group:'tablerow',command:'rowInsertBefore',order:5},tablerow_insertAfter:{label:n.row.insertAfter,group:'tablerow',command:'rowInsertAfter',order:10},tablerow_delete:{label:n.row.deleteRow,group:'tablerow',command:'rowDelete',order:15},tablecolumn:{label:n.column.menu,group:'tablecolumn',order:1,getItems:function(){return{tablecolumn_insertBefore:CKEDITOR.TRISTATE_OFF,tablecolumn_insertAfter:CKEDITOR.TRISTATE_OFF,tablecolumn_delete:CKEDITOR.TRISTATE_OFF};}},tablecolumn_insertBefore:{label:n.column.insertBefore,group:'tablecolumn',command:'columnInsertBefore',order:5},tablecolumn_insertAfter:{label:n.column.insertAfter,group:'tablecolumn',command:'columnInsertAfter',order:10},tablecolumn_delete:{label:n.column.deleteColumn,group:'tablecolumn',command:'columnDelete',order:15}});if(m.contextMenu)m.contextMenu.addListener(function(o,p){if(!o)return null;var q=!o.is('table')&&o.hasAscendant('table');if(q)return{tablecell:CKEDITOR.TRISTATE_OFF,tablerow:CKEDITOR.TRISTATE_OFF,tablecolumn:CKEDITOR.TRISTATE_OFF};return null;});}});})();
