package main

import (
	"fmt"
	"io/ioutil"
	"strconv"
	"strings"
	"time"
)

// Declare return variable and type at function definition (?)
func getInput() (input string) {
	bytes, _ := ioutil.ReadFile("input")
	//check(err)
	input = strings.TrimSpace(string(bytes))
	return
}

func convertInput(input string) (inputS []int) {
	temp := strings.Split(input, "\n")
	inputS = make([]int, 0)
	for _, stringValue := range temp {
		i, _ := strconv.Atoi(stringValue)
		//check(err)
		inputS = append(inputS, i)
	}
	return
}

/* func check(e error) {
	if e != nil {
		panic(e)
	}
} */

func loopUntilDuplicate(inputS []int) (iterations int, currentFreq int) {
	iterations = 0
	freqs := make(map[int]bool)
	for {
		//fmt.Printf("Iterations: %d\n", iterations)
		for _, value := range inputS {
			currentFreq += value
			_, exists := freqs[currentFreq]

			if exists {
				return
			}

			freqs[currentFreq] = true
		}

		iterations++
	}
}

func main() {
	start := time.Now()

	input := convertInput(getInput())
	iterations, duplicateFreq := loopUntilDuplicate(input)
	elapsed := time.Since(start)

	fmt.Printf("Duplicate: %d\n", duplicateFreq)
	fmt.Printf("Iterations: %d\n", iterations)
	fmt.Printf("Execution time: %s\n", elapsed)
}
