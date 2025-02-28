import sys
import json

def process_numbers(numbers):
    # Validate that all inputs are numeric
    try:
        numbers = [float(num) for num in numbers]
    except ValueError:
        return "<p>Error: All values must be numeric.</p>"

    # Check for negative values
    negatives = [num for num in numbers if num < 0]
    negative_message = "<p>Negative values detected.</p>" if negatives else ""

    # Calculate the average
    average = sum(numbers) / len(numbers)
    if average > 50:
        avg_message = f"<p>Average: {average:.2f} is greater than 50.</p>"
    else:
        avg_message = f"<p>Average: {average:.2f} is below 50.</p>"

    # Bitwise operation to check if the count of positive numbers is even or odd
    positive_count = sum(1 for num in numbers if num > 0)
    even_odd_message = f"<p>Number of positive values is {'even' if positive_count & 1 == 0 else 'odd'}.</p>"

    # Filter values greater than 10 and sort them
    filtered_sorted = sorted([num for num in numbers if num > 10])
    original_values = ", ".join(map(str, numbers))
    sorted_values = ", ".join(map(str, filtered_sorted))

    # Generate the HTML output
    result_html = f"""
    <h2>Results:</h2>
    {negative_message}
    {avg_message}
    {even_odd_message}
    <p>Original Values: {original_values}</p>
    <p>Sorted Values (greater than 10): {sorted_values if sorted_values else 'None'}</p>
    """
    return result_html

if __name__ == "__main__":
    # Read input data from stdin (PHP will send it as JSON)
    input_data = sys.stdin.read()
    numbers = json.loads(input_data)
    print(process_numbers(numbers))
