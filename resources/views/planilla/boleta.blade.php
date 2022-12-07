<!DOCTYPE html">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
      html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
      a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
      a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
      div.comment { display:none }
      table { border-collapse:collapse; page-break-after:always }
      .gridlines td { border:1px dotted black }
      .gridlines th { border:1px dotted black }
      .b { text-align:center }
      .e { text-align:center }
      .f { text-align:right }
      .inlineStr { text-align:left }
      .n { text-align:right }
      .s { text-align:left }
      td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      td.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style2 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style2 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style3 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:8pt; background-color:white }
      th.style3 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:8pt; background-color:white }
      td.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style5 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style5 { vertical-align:bottom; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style7 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style7 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style8 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:8pt; background-color:white }
      th.style8 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:8pt; background-color:white }
      td.style9 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#969696; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style9 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#969696; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style10 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style10 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style11 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style11 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style12 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style12 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style13 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style13 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style14 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style14 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style15 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style15 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style16 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style16 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style17 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style17 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style18 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style18 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style19 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style19 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style20 { vertical-align:bottom; border-bottom:3px double #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style20 { vertical-align:bottom; border-bottom:3px double #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style21 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style21 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style22 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style22 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style23 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style23 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style24 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:8pt; background-color:white }
      th.style24 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:8pt; background-color:white }
      td.style25 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Tahoma'; font-size:12pt; background-color:white }
      th.style25 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Tahoma'; font-size:12pt; background-color:white }
      td.style26 { vertical-align:bottom; text-align:left; padding-left: 15px;padding-top: 5px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Tahoma'; font-size:12pt; background-color:white }
      th.style26 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Tahoma'; font-size:12pt; background-color:white }
      td.style27 { vertical-align:bottom; text-align:left; padding-left: 15px; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:8pt; background-color:white }
      th.style27 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:8pt; background-color:white }
      td.style28 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style28 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style29 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-style:italic; color:#000000; font-family:'Tahoma'; font-size:9pt; background-color:white }
      th.style29 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-style:italic; color:#000000; font-family:'Tahoma'; font-size:9pt; background-color:white }
      td.style30 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style30 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style31 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style31 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style32 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style32 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style33 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Tahoma'; font-size:18pt; background-color:white }
      th.style33 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Tahoma'; font-size:18pt; background-color:white }
      td.style34 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Tahoma'; font-size:18pt; background-color:white }
      th.style34 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Tahoma'; font-size:18pt; background-color:white }
      td.style35 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Tahoma'; font-size:18pt; background-color:white }
      th.style35 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Tahoma'; font-size:18pt; background-color:white }
      td.style36 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style36 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style37 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style37 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style38 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style38 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style39 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Tahoma'; font-size:12pt; background-color:white }
      th.style39 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Tahoma'; font-size:12pt; background-color:white }
      td.style40 { vertical-align:bottom; text-align:left; padding-left: 15px; padding-top: 5px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Tahoma'; font-size:12pt; background-color:white }
      th.style40 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Tahoma'; font-size:12pt; background-color:white }
      td.style41 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style41 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style42 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style42 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      td.style43 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      th.style43 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Tahoma'; font-size:10pt; background-color:white }
      table.sheet0 col.col0 { width:14.23333317pt }
      table.sheet0 col.col1 { width:8.81111101pt }
      table.sheet0 col.col2 { width:70.48888808pt }
      table.sheet0 col.col3 { width:57.61111045pt }
      table.sheet0 col.col4 { width:74.5555547pt }
      table.sheet0 col.col5 { width:13.5555554pt }
      table.sheet0 col.col6 { width:70.48888808pt }
      table.sheet0 col.col7 { width:59.64444376pt }
      table.sheet0 col.col8 { width:74.5555547pt }
      table.sheet0 col.col9 { width:9.48888878pt }
      table.sheet0 col.col10 { width:9.48888878pt }
      table.sheet0 col.col11 { width:54.2222216pt }
      table.sheet0 col.col12 { width:54.89999937pt }
      table.sheet0 col.col13 { width:54.2222216pt }
      table.sheet0 tr { height:12.75pt }
      table.sheet0 tr.row0 { height:15pt }
      table.sheet0 tr.row1 { height:15pt }
      table.sheet0 tr.row3 { height:6.75pt }
      table.sheet0 tr.row4 { height:22.5pt }
      table.sheet0 tr.row6 { height:9pt }
      table.sheet0 tr.row11 { height:6.75pt }
      table.sheet0 tr.row20 { height:13.5pt }
      table.sheet0 tr.row21 { height:13.5pt }
      table.sheet0 tr.row22 { height:16.5pt }
      table.sheet0 tr.row23 { height:16.5pt }
      table.sheet0 tr.row24 { height:16.5pt }
      table.sheet0 tr.row27 { height:8.25pt }
      @page { margin-left: 0in; margin-right: 0in; margin-top: 0in; margin-bottom: 0in; }
      body { margin-left: 0.9in; margin-right: -2in; margin-top: 0.5in; margin-bottom: 0in; }
        #fijado {
            position:fixed;
            left:0px;
            top:80px;
        }
        #fijado1 {
            position:fixed;
            left:70px;
            top:80px;
        }
        @media print {
            #fijado, #fijado1 {
            display: none !important;;
        }
        }
    </style>
  </head>
<body>
    <div id="fijado"> <button type="button" onClick="window.print(); return false;" title="Imprimir value"><img src="{{ asset('imprimir.png') }}" alt="" width="45"></button> <a href="{{ url('boletas') }}" id="fijado1"><img src="{{ asset('atras.png')}}" width="50" title="Retornar a generar value"></a></div>
    @foreach ($planilla as $value)
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0" width="100%">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <col class="col10">
        <col class="col11">
        <col class="col12">
        <col class="col13">
        <tbody>
          <tr class="row0">
            <td class="column0">&nbsp;</td>
            <td colspan="6" align="left" class="column1 style39 s style40">EMPRESA: {{ $empresa->razon_social }}</td>
            <td class="column7 style4 null"></td>
            <td class="column8 style4 null"></td>
            <td class="column9 style4 null"></td>
            <td class="column10 style5 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row1">
            <td class="column0">&nbsp;</td>
            <td colspan="6" align="left" class="column1 style25 s style26">NIT:  {{ $empresa->n_nit }}</td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row2">
            <td class="column0">&nbsp;</td>
            <td colspan="6" align="left" class="column1 style27 s style24">POTOSI - BOLIVIA</td>
            <td class="column7 style6 null"></td>
            <td class="column8 style41 s style41" colspan="2">DPTO. ADM Y FIN {{ $anio }}</td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row3">
            <td class="column0">&nbsp;</td>
            <td class="column1 style8 null"></td>
            <td class="column2 style3 null"></td>
            <td class="column3 style3 null"></td>
            <td class="column4 style6 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row4">
            <td class="column0">&nbsp;</td>
            <td class="column1 style33 s style35" colspan="10">BOLETA DE PAGO</td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row5">
            <td class="column0">&nbsp;</td>
            <td class="column1 style37 s style38" colspan="10">(Expresado en bolivianos)</td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row6">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style11 null"></td>
            <td class="column4 style11 null"></td>
            <td class="column5 style11 null"></td>
            <td class="column6 style11 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row7">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 s">NOMBRE</td>
            <td class="column3 style42 s style42" colspan="2">{{ $value->nombre.' '.$value->primer_apellido.' '.$value->segundo_apellido  }}</td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 s">SUELDO BASICO</td>
            <td class="column7 style6 null"></td>
            <td class="column8 style12 n">{{ $value->sueldo_inicial }}</td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row8">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 s">C.I. </td>
            <td class="column3 style41 n style41" colspan="2">{{ $value->doc_identidad }}</td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 s">DIAS TRABAJADOS</td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 n">{{ $value->dias_pagados }}</td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row9">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 s">CARGO</td>
            <td class="column3 style41 s style41" colspan="2">{{ $value->cargo }}</td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 s">MES</td>
            <td class="column7 style6 null"></td>
            <td class="column8 style13 s">{{ $value->mes }}</td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row10">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style14 s">F-INGRESO</td>
            <td class="column3 style15 n">{{ $value->fecha_ingreso }}</td>
            <td class="column4 style6 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style16 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row11">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style6 null"></td>
            <td class="column4 style6 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row12">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style36 s style36" colspan="3">INGRESOS</td>
            <td class="column5 style6 null"></td>
            <td class="column6 style36 s style36" colspan="3">EGRESOS</td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row13">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style41 s style41" colspan="2">SALARIO GANADO</td>
            <td class="column4 style12 n">{{ $value->sueldo_inicial }}</td>
            <td class="column5 style17 null"></td>
            <td class="column6 style41 s style41" colspan="2">AFP´S (12,71%) Y ANS</td>
            <td class="column8 style12 n">{{ $value->afps }}</td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row14">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style42 s style42" colspan="2">BONO DE ANTIGÜEDAD</td>
            <td class="column4 style12 n">{{ $value->bono_antiguedad }}</td>
            <td class="column5 style6 null"></td>
            <td class="column6 style41 s style41" colspan="2">RC-IVA (13%)</td>
            <td class="column8 style12 n">{{ $value->rc_iva }}</td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row15">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style42 s style42" colspan="2">HORAS EXTRAS</td>
            <td class="column4 style18 n">{{ $value->trabajo_extra_nocturno }}</td>
            <td class="column5 style6 null"></td>
            <td class="column6 style42 s style42" colspan="2">ANTICIPO Y OTROS DSCTOS.</td>
            <td class="column8 style12 n">{{ $value->otros_descuentos }}</td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row16">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style42 s style42" colspan="2"></td>
            <td class="column4 style18 n"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style14 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style12 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row17">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style6 null"></td>
            <td class="column4 style12 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style12 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row18">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style41 s style43" colspan="2">TOTAL INGRESOS</td>
            <td class="column4 style19 n">{{ $value->total_ganado }}</td>
            <td class="column5 style6 null"></td>
            <td class="column6 style41 s style43" colspan="2">TOTAL EGRESOS</td>
            <td class="column8 style19 n">{{ $value->total_descuentos }}</td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row19">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style6 null"></td>
            <td class="column4 style12 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row20">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style41 s style41" colspan="2">LIQUIDO PAGABLE <span style="font-weight:bold; color:#000000; font-family:'Tahoma'; font-size:10pt">( I - E )</span></td>
            <td class="column4 style20 n">{{ $value->liquido_pagable }}</td>
            <td class="column5 style6 null"></td>
            <td class="column6 style29 null style29" colspan="3" rowspan="2"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row21">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style6 null"></td>
            <td class="column4 style17 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12 style9 null"></td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row22">
            <td class="column0">&nbsp;</td>
            <td class="column1 style30 f style32" colspan="10">


<script type="text/javascript"> var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); var f=new Date(); document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear()); </script>

</td>

            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row23">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style6 null"></td>
            <td class="column4 style6 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row24">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style6 null"></td>
            <td class="column4 style6 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row25">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style2 null"></td>
            <td class="column4 style2 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style2 null"></td>
            <td class="column8 style2 null"></td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row26">
            <td class="column0">&nbsp;</td>
            <td class="column1 style10 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style28 s style28" colspan="2">RECIBI CONFORME</td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 null"></td>
            <td class="column7 style28 s style28" colspan="2">JEFE DPTO. ADM Y FIN</td>
            <td class="column9 style6 null"></td>
            <td class="column10 style7 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
          <tr class="row27">
            <td class="column0">&nbsp;</td>
            <td class="column1 style21 null"></td>
            <td class="column2 style22 null"></td>
            <td class="column3 style22 null"></td>
            <td class="column4 style22 null"></td>
            <td class="column5 style22 null"></td>
            <td class="column6 style22 null"></td>
            <td class="column7 style22 null"></td>
            <td class="column8 style22 null"></td>
            <td class="column9 style22 null"></td>
            <td class="column10 style23 null"></td>
            <td class="column11">&nbsp;</td>
            <td class="column12">&nbsp;</td>
            <td class="column13">&nbsp;</td>
          </tr>
        </tbody>
    </table>
    <br>
    @endforeach
  </body>
</html>
