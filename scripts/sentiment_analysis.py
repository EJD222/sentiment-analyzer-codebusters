from textblob import TextBlob
import sys
import json

# Read the text input from the command line argument
input_text = sys.argv[1]

# Analyze sentiment using TextBlob
blob = TextBlob(input_text)

# Prepare highlighted text with placeholders to avoid overlapping replacements
highlighted_text = input_text
positive_words = []
negative_words = []

# Use unique placeholders for replacement to avoid conflicts
for word in blob.words:
    sentiment_polarity = TextBlob(word).sentiment.polarity
    if sentiment_polarity > 0:
        positive_words.append(word)
        # Use a placeholder for positive words
        highlighted_text = highlighted_text.replace(word, f"{{POSITIVE:{word}}}")
    elif sentiment_polarity < 0:
        negative_words.append(word)
        # Use a placeholder for negative words
        highlighted_text = highlighted_text.replace(word, f"{{NEGATIVE:{word}}}")

# Replace placeholders with final HTML-safe highlights
highlighted_text = highlighted_text.replace(
    "{POSITIVE:", "<span class='positive-word'>"
).replace("}", "</span>")
highlighted_text = highlighted_text.replace(
    "{NEGATIVE:", "<span class='negative-word'>"
).replace("}", "</span>")

# Prepare the response with polarity, subjectivity, and highlighted text
sentiment = blob.sentiment
response = {
    "polarity": sentiment.polarity,  # Sentiment polarity
    "subjectivity": sentiment.subjectivity,  # Sentiment subjectivity
    "sentiment": "positive" if sentiment.polarity > 0 else "negative" if sentiment.polarity < 0 else "neutral",
    "highlighted_text": highlighted_text,  # Text with highlights
    "positive_words": positive_words,  # List of positive words
    "negative_words": negative_words,  # List of negative words
}

# Output the response as JSON
print(json.dumps(response))
