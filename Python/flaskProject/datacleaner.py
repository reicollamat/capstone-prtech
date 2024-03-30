import string

import pandas as pd

# from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
import emoji
import re
from stopword import preprocess


def clean_text(text):
    """
    This function cleans text data by performing various cleaning steps.

    Args:
        text: The text string to be cleaned.

    Returns:
        The cleaned text string.
    """

    # Lowercase the text
    text = text.lower()

    # Remove URLs using a dedicated library function
    text = re.sub(r"http\S+|https\S+|www\S+", "", text)

    # Remove HTML tags using a dedicated library function
    text = pd.Series(text).str.replace(r"<.*?>+", "", regex=True).values[0]

    # Remove punctuation
    text = text.translate(str.maketrans("", "", string.punctuation))

    # Remove newlines
    text = text.replace("\n", "")

    # Remove emojis
    text = emoji.demojize(text)

    # Remove stop words (assuming NLTK is downloaded)
    # stop_words = preprocess()
    # text_tokens = word_tokenize(text)
    # tokens_without_sw = [word for word in text.split() if word not in stop_words]
    # filtered_sentence = " ".join(tokens_without_sw)
    # text = filtered_sentence

    return text


# # Example usage (assuming you have a dataframe named 'df' with a 'text' column)
# df['cleaned_text'] = df['text'].apply(clean_text)
