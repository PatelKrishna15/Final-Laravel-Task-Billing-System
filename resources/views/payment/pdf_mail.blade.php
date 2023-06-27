<table width="99%" border="0" cellpadding="1" cellspacing="0" bgcolor="#EAEAEA">
    <tbody>
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
                    <tbody>
                      
                        <tr style="background: #fff;">
                            <td colspan="2"><center><h2>New Student Orientation Form</h2></center></td>
                        </tr>
                        <tr bgcolor="#EAF2FA">
                            <td colspan="2">
                                <font style="font-family:sans-serif;font-size:12px"><strong>STUDENT FULL NAME</strong></font>
                            </td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                            <td>
                                <font style="font-family:sans-serif;font-size:12px">{{$payment->customer->customer_name}}</font>
                            </td>
                        </tr>
                        <tr bgcolor="#EAF2FA">
                            <td colspan="2">
                                <font style="font-family:sans-serif;font-size:12px"><strong>Student Email id</strong></font>
                            </td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                            <td>
                                <font style="font-family:sans-serif;font-size:12px"><a href="mailto:{{$payment->customer->customer_email}}" rel="noreferrer" target="_blank">{{$payment->customer->customer_email}}</a></font>
                            </td>
                        </tr>
                        <tr bgcolor="#EAF2FA">
                            <td colspan="2">
                                <font style="font-family:sans-serif;font-size:12px"><strong>Student Contact Number</strong></font>
                            </td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                            <td>
                                <font style="font-family:sans-serif;font-size:12px">{{ $payment->product_name }}</font>
                            </td>
                        </tr>
                        <tr bgcolor="#EAF2FA">
                            <td colspan="2">
                                <font style="font-family:sans-serif;font-size:12px"><strong>YOUR STUDENT ID NUMBER</strong></font>
                            </td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                            <td>
                                <font style="font-family:sans-serif;font-size:12px">{{ $payment->quantity }}</font> 
                            </td>
                        </tr>
                        <tr bgcolor="#EAF2FA">
                            <td colspan="2">
                                <font style="font-family:sans-serif;font-size:12px"><strong>AUSTRALIA ADDRESS</strong></font>
                            </td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                            <td>
                                <font style="font-family:sans-serif;font-size:12px">{{ $payment->start_date }}</font>
                            </td>
                        </tr>
                        <tr bgcolor="#EAF2FA">
                            <td colspan="2">
                                <font style="font-family:sans-serif;font-size:12px"><strong>AUSTRALIA ADDRESS</strong></font>
                            </td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                            <td>
                                <font style="font-family:sans-serif;font-size:12px">{{ $payment->end_date }}</font>
                            </td>
                        </tr>
                        <tr bgcolor="#EAF2FA">
                            <td colspan="2">
                                <font style="font-family:sans-serif;font-size:12px"><strong>OVERSEAS ADDRESS</strong></font>
                            </td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                            <td>
                                <font style="font-family:sans-serif;font-size:12px">{{ $payment->payment_method }}</font>
                            </td>
                        </tr>
                        <tr bgcolor="#EAF2FA">
                            <td colspan="2">
                                <font style="font-family:sans-serif;font-size:12px"><strong>USI NUMBER </strong></font>
                            </td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                            <td>
                                <font style="font-family:sans-serif;font-size:12px">{{$payment->result }}</font>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>