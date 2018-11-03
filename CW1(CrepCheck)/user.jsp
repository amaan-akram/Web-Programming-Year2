<%@ page import="java.sql.*" %>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang"en" lang"en">       
        
         <%@ page import="java.sql.*" %>
 <% Class.forName("com.mysql.jdbc.Driver").newInstance();
    Connection conn = DriverManager.getConnection(
      "jdbc:mysql://mysql-server-1/aa322?user=aa322&password=abcaa322354");
    
    Statement stmt = conn.createStatement();
    String sql = "insert into users values ";
    String username = request.getParameter("userName");
    String name = request.getParameter("name");
    sql += "('" + username + "', '" + name + "')"; %>
 <%= stmt.executeUpdate(sql) %> record added.
             