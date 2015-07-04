
@extends('base')

@section('body')

<table  cellpadding="10" border="1">
<tr><td>Name</td><td>OpenCart Info</td><td>Shops</td><td>Contacts</td><td>Smtp Info</td></tr>
<?php

foreach ($organizations as $organization) {
    echo "<tr><td>" . $organization->long_name . "</td>" .
    		"<td>" . $organization->ocHost . "</td>" .
    		"<td>" . $organization->companies . "</td>" .
    		"<td>" . $organization->contacts . "</td>" .
    		"<td>" . $organization->smtpHost . "</td>" .
    	"</tr>";
}

?>
</table>
@stop