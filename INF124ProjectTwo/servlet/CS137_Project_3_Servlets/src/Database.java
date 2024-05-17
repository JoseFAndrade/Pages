import java.sql.DriverManager;
import java.sql.Connection;


public class Database {
	public static void main(String args[])
	{
		try
		{
			//Class.forName("oracle.jdbc.driver.OracleDriver");
			Class.forName("com.mysql.cj.jdbc.Driver");
			Connection conn = null;
			conn = DriverManager.getConnection("jdbc:mysql://localhost:3309/CoffeeDB", "root", "");
			System.out.println("Database is connected!");
			conn.close();
		}
		catch(Exception e)
		{
			System.out.println("Did not connect to the Database successfully.");
		}
	}
	
	public 
	
//	public Database()
//	{
//		try
//		{
//			Class.forName("oracle.jdbc.driver.OracleDriver");
//			Connection conn = null;
//			conn = DriverManager.getConnection("jdbc:mysql://localhost/CoffeeDB", "root", "");
//			System.out.println("Database is connected!");
//			conn.close();
//		}
//		catch(Exception e)
//		{
//			System.out.println("Did not connect to the Database successfully.");
//		}
//	}
}
