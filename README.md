# Challenges

### 1. FizzBuzz
Write a PHP script that prints all integer values from 1 to 100.
For multiples of three output "Fizz" instead of the value and for the multiples of five output "Buzz".
Values which are multiples of both three and five should output as "FizzBuzz".

### 2. 500 element Array
Write a PHP script to generate a random array of 500 integers (values of 1 – 500 inclusive).
Randomly remove and discard an arbitary element from this newly generated array.
Write the code to efficiently determine the value of the missing element.
Explain your reasoning with comments.

### 3. Database Connectivity
Demonstrate with PHP how you would connect to a MySQL (InnoDB) database and query for all
records with the following fields: (name, age, job_title) from a table called 'exads_test'.
Also provide an example of how you would write a sanitised record to the same table.

### 4. Date Calculation
The Irish National Lottery draw takes place twice weekly on a Wednesday and a Saturday at 8pm.
Write a function or class that calculates and returns the next valid draw date based on the current
date and time AND also on an optionally supplied date and time.

## How to run and test

This set of exercices has a docker, all you need is docker installed and configured on your machine.
(I am assuming that you are using a UNIX machine)

Start by running the following commands in the root directory:
> `cd docker`

> `docker-compose up -d`

Running challenge 1:
> `./challenge01run.sh`

Running challenge 2:
> `./challenge02run.sh`

Running challenge 3:
> `./challenge03createDB.sh`

> `./challenge03run.sh`

Running challenge 4:
> `./challenge04run.sh`

