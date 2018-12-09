package main

import (
	"fmt"
	"io/ioutil"
	"strconv"
	"strings"
)

func check(e error) {
	if e != nil {
		panic(e)
	}
}

func main() {
	currentFreq := 0

	input, err := ioutil.ReadFile("input")
	inputS := string(input)

	check(err)

	inputA := strings.Split(inputS, "\n")

	//fmt.Printf("%q\n", inputA)
	//fmt.Println(reflect.TypeOf(input))

	//currentValue := 0

	for _, value := range inputA {
		intValue, err := strconv.Atoi(value)

		check(err)

		currentFreq += intValue
	}

	fmt.Println(currentFreq)
}
