from textblob import TextBlob
import sys
import json

# Read the text input from the command line argument
input_text = sys.argv[1]

# Analyze sentiment using TextBlob
blob = TextBlob(input_text)
sentiment = blob.sentiment

# Prepare a response with polarity and subjectivity
response = {
    "polarity": sentiment.polarity,  # Ranges from -1 (negative) to 1 (positive)
    "subjectivity": sentiment.subjectivity,  # Ranges from 0 (objective) to 1 (subjective)
    "sentiment": "positive" if sentiment.polarity > 0 else "negative" if sentiment.polarity < 0 else "neutral"
}

# Output the response as JSON
print(json.dumps(response))