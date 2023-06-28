<html>

<head>

    <title>How to create Dynamic PDF & Sending by Email in Laravel</title>

</head>

<body>
    <table width="99%" border="0" cellpadding="1" cellspacing="0" bgcolor="#EAEAEA">
        <tbody>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
                        <tbody>
                          
                            <tr style="background: #fff;">
                                <td colspan="2"><center><h2>Payment System</h2></center></td>
                            </tr>
                            <tr bgcolor="#EAF2FA">
                                <td colspan="2">
                                    <font style="font-family:sans-serif;font-size:12px"><strong>Customer Name</strong></font>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>
                                    <font style="font-family:sans-serif;font-size:12px">{{$customer_name}}</font>
                                </td>
                            </tr>
                            <tr bgcolor="#EAF2FA">
                                <td colspan="2">
                                    <font style="font-family:sans-serif;font-size:12px"><strong>Customer Email</strong></font>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>
                                    <font style="font-family:sans-serif;font-size:12px"><a href="mailto:{{ $customer_email }}" rel="noreferrer" target="_blank">{{  $customer_email}}</a></font>
                                </td>
                            </tr>
                            <tr bgcolor="#EAF2FA">
                                <td colspan="2">
                                    <font style="font-family:sans-serif;font-size:12px"><strong>Product Name</strong></font>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>
                                    <font style="font-family:sans-serif;font-size:12px">{{ $product_name }}</font>
                                </td>
                            </tr>
                            <tr bgcolor="#EAF2FA">
                                <td colspan="2">
                                    <font style="font-family:sans-serif;font-size:12px"><strong>Quantity</strong></font>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>
                                    <font style="font-family:sans-serif;font-size:12px">{{ $quantity }}</font> 
                                </td>
                            </tr>
                            <tr bgcolor="#EAF2FA">
                                <td colspan="2">
                                    <font style="font-family:sans-serif;font-size:12px"><strong>Start Date</strong></font>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>
                                    <font style="font-family:sans-serif;font-size:12px">{{ $start_date }}</font>
                                </td>
                            </tr>
                            <tr bgcolor="#EAF2FA">
                                <td colspan="2">
                                    <font style="font-family:sans-serif;font-size:12px"><strong>End Date</strong></font>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>
                                    <font style="font-family:sans-serif;font-size:12px">{{ $end_date }}</font>
                                </td>
                            </tr>
                            <tr bgcolor="#EAF2FA">
                                <td colspan="2">
                                    <font style="font-family:sans-serif;font-size:12px"><strong>Payment Method</strong></font>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>
                                    <font style="font-family:sans-serif;font-size:12px">{{ $payment_method }}</font>
                                </td>
                            </tr>
                            <tr bgcolor="#EAF2FA">
                                <td colspan="2">
                                    <font style="font-family:sans-serif;font-size:12px"><strong>Total </strong></font>
                                </td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>
                                    <font style="font-family:sans-serif;font-size:12px">{{ $result }}</font>
                                </td>
                            </tr>
                           
</body>

</html>