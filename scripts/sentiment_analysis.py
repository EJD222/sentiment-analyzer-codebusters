from textblob import TextBlob
import sys
import json

# Read the text input from the command line argument
input_text = sys.argv[1]

# Analyze sentiment using TextBlob
blob = TextBlob(input_text)

# Prepare highlighted text
highlighted_text = input_text
positive_words = []
negative_words = []

for word in blob.words:
    sentiment_polarity = TextBlob(word).sentiment.polarity
    if sentiment_polarity > 0:
        highlighted_text = highlighted_text.replace(word, f"<span class='positive-word'>{word}</span>")
        positive_words.append(word)
    elif sentiment_polarity < 0:
        highlighted_text = highlighted_text.replace(word, f"<span class='negative-word'>{word}</span>")
        negative_words.append(word)

# Prepare a response with polarity, subjectivity, and highlighted text
sentiment = blob.sentiment
response = {
    "polarity": sentiment.polarity,
    "subjectivity": sentiment.subjectivity,
    "sentiment": "positive" if sentiment.polarity > 0 else "negative" if sentiment.polarity < 0 else "neutral",
    "highlighted_text": highlighted_text,
    "positive_words": positive_words,
    "negative_words": negative_words
}

# Output the response as JSON
print(json.dumps(response))