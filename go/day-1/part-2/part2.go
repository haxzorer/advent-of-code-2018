package main

import (
	"fmt"
	"io/ioutil"
	"strconv"
	"strings"
	"time"
)

func check(e error) {
	if e != nil {
		panic(e)
	}
}

func existsInSlice(haystack []int, needle int) bool {
	for _, value := range haystack {
		if value == needle {
			return true
		}
	}

	return false
}

func main() {
	start := time.Now()
	currentFreq := 0
	var freqs []int
	// OR
	// freqs := make([]int, 0)

	input, err := ioutil.ReadFile("input")
	inputS := string(input)

	check(err)

	inputA := strings.Split(inputS, "\n")

	//fmt.Printf("%q\n", inputA)
	//fmt.Println(reflect.TypeOf(input))

	iterations, duplicateFound := 0, false

	for {
		//fmt.Printf("Iterations: %d\n", iterations)
		for _, value := range inputA {

			intValue, err := strconv.Atoi(value)

			check(err)

			//fmt.Printf("%d\n", intValue)

			currentFreq += intValue

			if existsInSlice(freqs, currentFreq) {
				duplicateFound = true
				break
			}

			freqs = append(freqs, currentFreq)
		}

		if duplicateFound {
			break
		}

		iterations++
	}

	elapsed := time.Since(start)

	fmt.Printf("Duplicate: %d\n", currentFreq)
	fmt.Printf("Iterations: %d\n", iterations)
	fmt.Printf("Execution time: %s\n", elapsed)
}
