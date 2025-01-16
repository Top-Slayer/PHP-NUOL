<?php
// Function to check if a number is prime
function isPrime($number) {
    if ($number <= 1) {
        return false; // 0 and 1 are not prime numbers
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false; // If divisible by any number other than 1 and itself
        }
    }
    return true;
}

// Generate prime numbers up to a given limit
function generatePrimes($limit) {
    $primes = [];
    for ($i = 2; $i <= $limit; $i++) {
        if (isPrime($i)) {
            $primes[] = $i;
        }
    }
    return $primes;
}

// Example usage
$limit = 100; // Find all prime numbers up to 100
$primeNumbers = generatePrimes($limit);

echo "Prime numbers up to $limit are: " . implode(', ', $primeNumbers);
?>
