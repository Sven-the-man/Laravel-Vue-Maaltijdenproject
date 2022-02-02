<template>
    <div class="container">
        <div class="title">
            <h1>Dit is de admin panel</h1>
            <h2> Voeg nieuw gerecht toe </h2>
        </div>
        <div class="mealTable">
            <table class="blueTable">
                <tbody>
                    <tr>
                        <td>Maaltijd naam</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Bami met sate en kroepoek</td>
                        <td>Update</td>
                        <td>Verwijder</td>
                    </tr>
                    <tr>
                        <td>Bami met sate en kroepoek</td>
                        <td>Update</td>
                        <td>Verwijder</td>
                    </tr>
                    <tr>
                        <td>Bami met sate en kroepoek</td>
                        <td>Update</td>
                        <td>Verwijder</td>
                    </tr>
                    <tr>
                        <td>Bami met sate en kroepoek</td>
                        <td>Update</td>
                        <td>Verwijder</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style>
  
body {
    text-align: center;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #1C6EA4;
    border: 1px solid black;
    display: inline-block;

  }
  
  li {
    float: left;
    
  }
  
  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
  
  li a:hover {
    background-color: #111;
  }

  table.blueTable {
    border: 1px solid #1C6EA4;
    background-color: #EEEEEE;
    width: 50%;
    text-align: left;
    border-collapse: collapse;
    margin-left: 25%;
    margin-right: 25%;
   
  }
  table.blueTable td, table.blueTable th {
    border: 1px solid #AAAAAA;
    padding: 3px 2px;
  }
  table.blueTable tbody td {
    font-size: 25px;
  }
  table.blueTable tr:nth-child(even) {
    background: #D0E4F5;
  }
  table.blueTable thead {
    background: #1C6EA4;
    background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
    background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
    background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
    border-bottom: 2px solid #444444;
  }
  table.blueTable thead th {
    font-size: 25px;
    font-weight: bold;
    color: #FFFFFF;
    border-left: 2px solid #D0E4F5;
  }
  table.blueTable thead th:first-child {
    border-left: none;
  }
</style>
