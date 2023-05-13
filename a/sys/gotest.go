package main

import "fmt"

var a string = "hello"

func main() {
	a := 5
	sum := 0
	for i := 0; i < a; i++ {
		fmt.Println(i)
		sum += i
	}
	fmt.Println("Сумма равна ", sum)
}
