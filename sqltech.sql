-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 06:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqltech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('birendrapradhan112@gmail.com', 'f0c8d3467bdd3259f7be6a6475cded0a');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `problem` varchar(5000) NOT NULL,
  `publish_date` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_path` varchar(5000) NOT NULL,
  `keywords` varchar(5000) NOT NULL,
  `content` longtext NOT NULL,
  `blogid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`problem`, `publish_date`, `category`, `image_path`, `keywords`, `content`, `blogid`) VALUES
('20 Top SQL Joins Interview Questions', '16-Apr-2024', 'SQLTECH', 'postimages/sqljoin.png', '20 Top SQL Joins Interview Questions', '<p>SQL, also known as Structured Query Language, is a powerful tool to search through large amounts of data and return specific information for analysis.&nbsp;<a href=\"https://www.datacamp.com/learn/sql\" target=\"_blank\">Learning SQL</a>&nbsp;is crucial for anyone aspiring to be a data analyst, data engineer, or data scientist, and it is helpful in many other fields, such as web development or marketing.</p>\r\n\r\n<p>Whether you&#39;re a job hunter who is looking for a new opportunity to apply your SQL skills or a hiring manager who is going to interrogate a candidate for a job opening in their company, something that must appear in the interview is questions related to SQL joins.</p>\r\n\r\n<p>In SQL, a join is a statement used to combine and retrieve records from two or multiple tables. SQL tables can be joined based on the relationship between the columns of those tables.</p>\r\n\r\n<p>In this post, we have outlined the most frequently asked SQL joins questions. Practicing these interview questions will help you prepare for the interview and feel more confident when asked about this popular concept.</p>\r\n\r\n<p>Ready for the test? Let&rsquo;s join together!</p>\r\n\r\n<h2>10 Beginner SQL Joins Interview Questions</h2>\r\n\r\n<h3>1. What is a join?</h3>\r\n\r\n<p>A join is a SQ clause used to combine and retrieve records from two or multiple tables. SQL tables can be joined based on the relationship between the columns of those tables. Check out our&nbsp;<a href=\"https://www.datacamp.com/tutorial/introduction-to-sql-joins\" target=\"_blank\">SQL joins</a>&nbsp;tutorial to know all the details about them.</p>\r\n\r\n<h3>2. What are the main types of joins?</h3>\r\n\r\n<p>There are six main types of joins:</p>\r\n\r\n<ul>\r\n	<li>INNER JOIN</li>\r\n	<li>LEFT JOIN</li>\r\n	<li>RIGHT JOIN</li>\r\n	<li>FULL JOIN</li>\r\n	<li>SELF JOIN</li>\r\n	<li>CROSS JOIN</li>\r\n</ul>\r\n\r\n<h3>3. What is the difference between a LEFT JOIN and a RIGHT JOIN?</h3>\r\n\r\n<p>The LEFT JOIN includes all records from the left side and matched rows from the right table, whereas the RIGHT JOIN returns all rows from the right side and unmatched rows from the left table. Essentially, both joins will throw the same result if we exchange the table order, provided that there are only two tables involved.</p>\r\n\r\n<h3>4. Why are joins important in SQL management?</h3>\r\n\r\n<p>SQL joins are crucial in SQL management for multiple reasons, including:</p>\r\n\r\n<ul>\r\n	<li>SQL JOINS are key methods to integrate multiple tables so they are easy to read and</li>\r\n	<li>They provide an efficient and accessible way to access and combine information in your database.</li>\r\n	<li>Using JOINS can reduce data usage and storage on the database.</li>\r\n</ul>\r\n\r\n<h3>5. What is an OUTER JOIN?</h3>\r\n\r\n<p>Outer joins are joins that return matched values and unmatched values from either or both tables. LEFT JOIN, RIGHT JOIN, AND FULL JOIN are considered outer joins.</p>\r\n\r\n<h3>6. What is an INNER JOIN?</h3>\r\n\r\n<p>An INNER JOIN returns only those records that satisfy a defined join condition in both (or all) tables. It&#39;s a default SQL join.</p>\r\n\r\n<h3>7. What is a CROSS JOIN?</h3>\r\n\r\n<p>A CROSS JOIN returns a paired combination of each row of the first table with each row of the second table. This join type is also known as cartesian join.</p>\r\n\r\n<h3>8. Is it possible to join a SQL table to itself?</h3>\r\n\r\n<p>Yes, this is normally done through a so-called self-join. A self-join is a type of JOIN used to compare rows within the same table. Unlike other SQL JOIN queries that join two or more tables, a self-join joins a table to itself.</p>\r\n\r\n<h3>9. What is the difference between FULL JOIN and CROSS JOIN?</h3>\r\n\r\n<p>A FULL JOIN returns all records from both tables. When the ON condition is not satisfied, it returns a NULL value. By contrast, a CROSS JOIN returns all possible combinations of all rows of both tables, resulting in a cartesian product between the two tables. This results in a larger table than the result of a FULL JOIN.</p>\r\n\r\n<h3>10. What is the purpose of using aliases in SQL JOINS?</h3>\r\n\r\n<p>As queries get more complex, names can get long and unwieldy. To help make things clearer, we can use aliases to assign new names to items in the query, including columns and tables. To give an alias to an object, we can use the AS clause.</p>\r\n\r\n<h2>10 Advanced SQL Joins Interview Questions</h2>\r\n\r\n<h3>11. What is an EQUI JOIN?</h3>\r\n\r\n<p>An EQUI JOIN is a type of join operation in a database that combines rows from two or more tables based on a matching condition using the equality operator (=). It is used to retrieve data where values in specified columns are equal.</p>\r\n\r\n<p>An EQUI JOIN returns the same results as an INNER JOIN with a different syntax, as shown in the following example:</p>\r\n\r\n<pre>\r\n\r\n&nbsp;</pre>\r\n\r\n<p><code>SELECT COURSES.name, TECHNOLOGIES.name FROM COURSES, TECHNOLOGIES WHERE COURSES.technology_id = TECHNOLOGIES.technology_id;</code></p>\r\n\r\n<p><a href=\"https://www.datacamp.com/workspace\" target=\"_blank\">POWERED BY DATACAMP WORKSPACE</a></p>\r\n\r\n<pre>\r\n\r\n&nbsp;</pre>\r\n\r\n<p><code>SELECT COURSES.name, TECHNOLOGIES.name FROM COURSES INNER JOIN TECHNOLOGIES ON COURSES.technology_id = TECHNOLOGIES.technology_id;</code></p>\r\n\r\n<p><a href=\"https://www.datacamp.com/workspace\" target=\"_blank\">POWERED BY DATACAMP WORKSPACE</a></p>\r\n\r\n<h3>12. What is the difference between the ON and USING clauses in a join?</h3>\r\n\r\n<p>You will usually use the ON keyword to specify the common columns in the two tables to make the join. When the columns used to join are called equally in both tables, the USING clause can be used as a shorthand.</p>\r\n\r\n<p>For example, if the tables COURSES and TECHNOLOGIES have a common column named &lsquo;technology_id&rsquo;, you can use the following query</p>\r\n\r\n<pre>\r\n\r\n&nbsp;</pre>\r\n\r\n<p><code>SELECT * FROM COURSES JOIN TECHNOLOGIES USING (technology_id);</code></p>\r\n\r\n<p><a href=\"https://www.datacamp.com/workspace\" target=\"_blank\">POWERED BY DATACAMP WORKSPACE</a></p>\r\n\r\n<h3>13. What is a NATURAL JOIN?</h3>\r\n\r\n<p>A NATURAL JOIN is used to create a JOIN based on common columns in two tables. Common columns are columns that have the same name in both tables.</p>\r\n\r\n<p>Drawing on the example in the previous question, we could write the same query as follows:</p>\r\n\r\n<pre>\r\n\r\n&nbsp;</pre>\r\n\r\n<p><code>SELECT * FROM COURSES NATURAL JOIN TECHNOLOGIES</code></p>\r\n\r\n<p><a href=\"https://www.datacamp.com/workspace\" target=\"_blank\">POWERED BY DATACAMP WORKSPACE</a></p>\r\n\r\n<h3>14. What is the difference between the JOIN clause and the UNION clause?</h3>\r\n\r\n<p>The JOIN clause is used to combine data into new columns based on the common columns of two or more tables.</p>\r\n\r\n<p>By contrast, the UNION clause is used to combine data into new rows, based on the result of two or more SELECT statements. In other words, UNION is used to concatenate datasets row-wise. To prevent errors, every SELECT statement within UNION must have the same number of columns, and the columns must also have similar data types.</p>\r\n\r\n<h3>15. What is a semi-join?</h3>\r\n\r\n<p>Semi Join queries are generally executed in the form of subqueries where rows are picked up only from the first (left) table with respect to a condition (or a set of conditions) that is matched in the second table. Unlike regular joins, which include the matching rows from both tables, a semi-join only includes columns from the left table in the result.</p>\r\n\r\n<h3>16. What is an anti-join?</h3>\r\n\r\n<p>Anti-joins, also known as anti-semi-joins, are the exact opposite of semi-joins. In Anti Join, rows are picked up from the first table with respect to a condition (or a set of conditions) that is not matched in the second table.</p>\r\n\r\n<h3>17. What is the difference between the INTERSECT clause and an INNER JOIN?</h3>\r\n\r\n<p>INNER JOIN blends data from multiple tables, creating one comprehensive result comprising those rows or records that satisfy a defined join condition in both tables.</p>\r\n\r\n<p>In contrast, INTERSECT focuses on common rows between SELECT statements. INNER JOIN relies on a shared column or field to connect tables, while INTERSECT works based on the structure of SELECT statements.</p>\r\n\r\n<p>INNER JOIN often returns a larger dataset that combines information from different tables, while INTERSECT produces a smaller dataset featuring only shared rows.</p>\r\n\r\n<h3>18. What performance considerations should be taken when using CROSS JOINS?</h3>\r\n\r\n<p>Since CROSS JOIN returns a paired combination of each row of the first table with each row of the second table, this can result in an extremely large table, especially if the joining tables are already large. Thus, be aware when using CROSS JOINS, as they have a high potential to consume considerable resources and trigger performance issues.</p>\r\n\r\n<h3>19. What do you understand by conditional JOIN?</h3>\r\n\r\n<p>Conditional joins are a powerful technique for combining data from multiple tables based on specific conditions, allowing users to create more dynamic and flexible queries. Conditional joins help database administrators define custom queries that can include additional statements, including aggregation functions, comparison operators, and logical operators.</p>\r\n\r\n<h3>20. What is the difference between the WHERE and ON clauses in SQL JOINS?</h3>\r\n\r\n<p>The purpose of the ON clause is to specify the join conditions, in other words, to define how the tables should be joined. Specifically, you define how the records should be matched.</p>\r\n\r\n<p>In contrast, the WHERE clause is used to specify the filtering conditions, that is, to define which rows should be kept in the result set. A JOIN that includes a filtering condition can be considered a conditional JOIN.</p>\r\n\r\n<h2>Preparing for Your SQL Joins Interview</h2>\r\n\r\n<p>A thorough preparation of your SQL interview is crucial to passing this stage in the application process. As we have seen, there are a good number of joins to learn. If you want to have a beginner-friendly guide to SQL joins, we highly recommend you read your&nbsp;<a href=\"https://www.datacamp.com/tutorial/introduction-to-sql-joins\" target=\"_blank\">Introduction to SQL Joins</a>. Or, if you want to get a solid understanding of joins, the best way to learn them is by practicing. Have a look at our&nbsp;<a href=\"https://www.datacamp.com/courses/joining-data-in-sql\" target=\"_blank\">Joining Data in SQL Course</a>&nbsp;to supercharge your queries using table joins and relational set theory.</p>\r\n\r\n<p>Yet there is a lot to talk about SQL joins. In most SQL interviews, this is only one of the many topics your interviewer will ask you about to test your SQL fluency. To help you get familiar with the most common SQL interview questions, we have prepared the following guides:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.datacamp.com/blog/top-sql-interview-questions-and-answers-for-beginners-and-intermediate-practitioners\" target=\"_blank\">The 80 Top SQL Interview Questions and Answers for Beginners &amp; Intermediate Practitioners</a></li>\r\n	<li><a href=\"https://www.datacamp.com/blog/top-postgresql-interview-questions-for-all-levels\" target=\"_blank\">Top 45 PostgreSQL Interview Questions For All Levels</a></li>\r\n	<li><a href=\"https://www.datacamp.com/blog/data-scientist-interview-questions\" target=\"_blank\">28 Top Data Scientist Interview Questions For All Levels</a></li>\r\n</ul>\r\n\r\n<p>Because of the high degree of uncertainty associated with interviews, this stage of the application process can be stressful. In the end, knowing the questions is only part of the story. The rest is knowing how to behave during the interview.</p>\r\n\r\n<p>To help you crack the interview, we have prepared a few tips and tricks.</p>\r\n\r\n<ul>\r\n	<li><strong>No one expects you to know everything.&nbsp;</strong>Not having a specific skill is normal. If the company asks for a solution in R, but you only know how to do it in Python, demonstrate how you can solve problems with Python and show your willingness to learn R.</li>\r\n	<li><strong>Think before answering.&nbsp;</strong>Ask for more time if the question requires it. It shows that you take their questions seriously. However, do not do it for every question.</li>\r\n	<li><strong>Explain why your role is key for the company.</strong>&nbsp;Sometimes, especially at smaller companies, they may not fully know why they need a data scientist. If this is the case, emphasize how you can improve the company&rsquo;s visibility and profits by enhancing the existing products or creating new solutions.</li>\r\n	<li><strong>Industries differ.&nbsp;</strong>Working as a data professional in different domains may differ quite a lot. A biotech company is different from a cloud service provider. Spend some time to understand the specifics of the company&rsquo;s domain and show the company that you want to learn. However, fundamentally anyone works with the data, and the data is approachable in similar ways no matter the industry.</li>\r\n	<li><strong>Handling rejections.&nbsp;</strong>That is the reality of today&#39;s competitive job market. Learn from your mistakes, continue learning new skills, and improve the old ones. Ask advice from more senior employees, especially if they work in data science. You can also ask for feedback from the interviewer if you&rsquo;re unsuccessful when applying for a role.</li>\r\n</ul>\r\n\r\n<h2>Conclusion</h2>\r\n\r\n<p>You made it! We hope this list of frequently asked SQL JOIN questions will help you prepare and nail the interview. We wish you all the luck in your incoming SQL interviews.</p>\r\n\r\n<p>In the meantime, if you feel that you need more confidence in your SQL skills, DataCamp gets you covered. Below, you can find a list with some of our courses, tracks, and dedicated SQL materials to help you train your skills:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.datacamp.com/tracks/sql-fundamentals\" target=\"_blank\">SQL Fundamentals Skill Track</a></li>\r\n	<li><a href=\"https://www.datacamp.com/tracks/data-analyst-in-sql\" target=\"_blank\">Data Analyst in SQL Career Track</a></li>\r\n	<li><a href=\"https://www.datacamp.com/courses/joining-data-in-sql\" target=\"_blank\">Joining Data in SQL Course</a></li>\r\n	<li><a href=\"https://www.datacamp.com/courses/intermediate-sql\" target=\"_blank\">Intermediate SQL Course</a></li>\r\n	<li><a href=\"https://www.datacamp.com/cheat-sheet/sql-joins-cheat-sheet\" target=\"_blank\">SQL Joins Cheat Sheet</a></li>\r\n</ul>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `blogid` int(100) NOT NULL,
  `comments` varchar(5000) NOT NULL,
  `Replay` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`blogid`, `comments`, `Replay`) VALUES
(1, 'Good Bro', 'Thnaks Bro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blogid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
