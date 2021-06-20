import static org.junit.Assert.assertEquals;
import static org.junit.Assert.assertTrue;
import static org.junit.jupiter.api.Assertions.assertTrue;


import java.util.List;


import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;


class WebDriverClassTest {
	
	
private static WebDriver webDriver;


	
	
	@BeforeAll
	public static void setUp() {
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\Ajla\\Desktop\\chromedriver91.exe");
		webDriver = new ChromeDriver();
	}
	

	//Test 1 

	@Test
	void testUrl() throws InterruptedException{
		// TODO Auto-generated method stub
		 String exePath = "C:\\Users\\Ajla\\Desktop\\chromedriver91.exe";
		 System.setProperty("webdriver.chrome.driver", exePath);
		 WebDriver driver = new ChromeDriver();
		 driver.get("https://seproject-ajla-kenan.herokuapp.com/");
		 
		 assertEquals("https://seproject-ajla-kenan.herokuapp.com/", driver.getCurrentUrl());	 
		 Thread.sleep(2000);
		 driver.quit();
	}
	
	//test 2 
		@Test
		void testCheckout () throws InterruptedException {
			// TODO Auto-generated method stub
			 String exePath = "C:\\Users\\Ajla\\Desktop\\chromedriver91.exe";
			 System.setProperty("webdriver.chrome.driver", exePath);
			 WebDriver driver = new ChromeDriver();
			 driver.get("https://seproject-ajla-kenan.herokuapp.com/");
			 
			 driver.findElement(By.id("checkout_nav")).click();
			 Thread.sleep(2000);
			 driver.findElement(By.id("name_checkout")).sendKeys("user");
			 driver.findElement(By.id("email_checkout")).sendKeys("user@user.com");
			 driver.findElement(By.id("address_checkout")).sendKeys("user address");
			 Thread.sleep(2000);
			 driver.findElement(By.id("checkout_button")).click();
			 Thread.sleep(5000);
			 
			 driver.quit();
		}

	
	//test 3 
	@Test
	void testLogin () throws InterruptedException {
		// TODO Auto-generated method stub
		 String exePath = "C:\\Users\\Ajla\\Desktop\\chromedriver91.exe";
		 System.setProperty("webdriver.chrome.driver", exePath);
		 WebDriver driver = new ChromeDriver();
		 driver.get("https://seproject-ajla-kenan.herokuapp.com/");
		 
		 driver.findElement(By.id("admin")).click();
		 Thread.sleep(2000);
		 driver.findElement(By.name("username")).sendKeys("ajla");
		 driver.findElement(By.name("password")).sendKeys("ajla123");
		 Thread.sleep(2000);
		 driver.findElement(By.id("logbutton")).click();
		 Thread.sleep(5000);
		 
		 driver.quit();
	}
	
	
	
	//test 4 
	//NOTE - IT HAS TO BE ITEM IN THE CART SO THAT THIS TEST WILL WORK
	//THIS WILL DELETE ONLY FIRST ITEM IN THE CART --> this is test for delete button
	
			@Test
			void TestCartDelete () throws InterruptedException {
				// TODO Auto-generated method stub
				 String exePath = "C:\\Users\\Ajla\\Desktop\\chromedriver91.exe";
				 System.setProperty("webdriver.chrome.driver", exePath);
				 WebDriver driver = new ChromeDriver();
				 driver.get("https://seproject-ajla-kenan.herokuapp.com/");
				 
				 driver.findElement(By.id("cart")).click();
				 Thread.sleep(2000);
				 
				 driver.findElement(By.className("text-danger")).click();
				 Thread.sleep(5000);
				 
				 driver.quit();
			}
			
	
	//TEST 5
			
			@Test
			void TestNavBar () throws InterruptedException {
				// TODO Auto-generated method stub
				 String exePath = "C:\\Users\\Ajla\\Desktop\\chromedriver91.exe";
				 System.setProperty("webdriver.chrome.driver", exePath);
				 WebDriver driver = new ChromeDriver();
				 driver.get("https://seproject-ajla-kenan.herokuapp.com/");
				 
				 driver.findElement(By.id("homeNav")).click();
				 Thread.sleep(3000);
				 driver.findElement(By.id("aboutNav")).click();
				 Thread.sleep(3000);
				 driver.findElement(By.id("admin")).click();
				 Thread.sleep(3000);
				 driver.findElement(By.id("checkout_nav")).click();
				 Thread.sleep(3000);
				 driver.findElement(By.id("cart")).click();
				 Thread.sleep(3000);
				 
				 driver.quit();
			}
			
	//?
			@Test
			void TestAddToCart () throws InterruptedException {
				// TODO Auto-generated method stub
				 String exePath = "C:\\Users\\Ajla\\Desktop\\chromedriver91.exe";
				 System.setProperty("webdriver.chrome.driver", exePath);
				 WebDriver driver = new ChromeDriver();
				 driver.get("https://seproject-ajla-kenan.herokuapp.com/");
				 
				 driver.findElement(By.id("cart")).sendKeys("2");
				 Thread.sleep(2000);
				 
				 driver.findElement(By.className("btn-info")).click();
				 Thread.sleep(5000);
				 
				 driver.quit();
			}
			
			
	
}