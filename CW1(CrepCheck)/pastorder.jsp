<%@ page import="java.sql.*" %>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang"en" lang"en">   
        
        
             
 <% Class.forName("com.mysql.jdbc.Driver").newInstance();
    Connection conn = DriverManager.getConnection(
      "jdbc:mysql://mysql-server-1/aa322?user=aa322&password=abcaa322354");
    
    Statement stmt = conn.createStatement();
    
    
    
    String username = request.getParameter("UserName");
    String name = request.getParameter("name");
     String sql2 = "SELECT productName, quantity, price, (quantity*price) FROM pastorders, product WHERE ";
        sql2 += "username = '" + username +"'AND pastorders.productID = product.productID";
        
        
        ResultSet result = stmt.executeQuery(sql2);
        String productName = "";
        int quantity = 0;
        int price = 0;
        int total = 0;
        int grandtotal = 0;
        %>
        
         <table border ="1">
         <tr> 
             <th>ProductName</th>
             <th>Quantity</th>
             <th>Price</th>
             <th>Total</th>
        </tr>
             <%
                while(result.next()){
                productName = result.getString(1);
                quantity = result.getInt(2);
                price = result.getInt(3);
                total = result.getInt(4);
                
                %>
                 <tr>
                     <td>
                         <%= productName %>
                     </td>
                         
                    <td>
                         <%= quantity %>
                     </td>
                            
                      <td>
                         <%= price %>
                     </td>
                          
                    <td>
                         <%= total %>
                    </td>
                 </tr>
                 <% } %>
                 <% result.close(); %>
            
        </table>
                     
                     

         
         
        <% 
        String sql3 = "SELECT SUM(quantity * price) FROM pastorders, product WHERE ";
        sql3 += "username = '" + username + "' AND pastorders.productID = product.productID";
        ResultSet result3 = stmt.executeQuery(sql3);
        %>
            
            
        <table border ="1">
         <tr> 
             <th>GrandTotal</th>
        </tr>
             <%
                while(result3.next()){
                grandtotal = result3.getInt(1);
             
                
                %>
                 <tr>
                     <td>
                         <%= grandtotal %>
                     </td>
                         
                 </tr>
                 <% } %>
                 <% result3.close(); %>
            
        </table>
             