import io
import matplotlib.pyplot as plt
from flask import Flask, request, send_file, abort, jsonify
from wordcloud import WordCloud
from collections import Counter

from stopword import preprocess

import datacleaner

# A very simple Flask Hello World app for you to get started with...

app = Flask(__name__)

# get stopwords from stopword.py
stopwords = preprocess()

# # Define global stopwords list (feel free to customize)
user_stopwords: set = set()


@app.route("/")
def hello_world():
    return "Hello from Flask!"


@app.post("/generatepositive")
def generatepostive():
    global user_stopwords
    data = request.get_json()

    if data is None:
        return abort(404, description="Data not found")

    reviews = data["reviews"]

    # clean the reviews
    clean_reviews = datacleaner.clean_text(reviews)

    # debug print
    print(f"clean_reviews: {clean_reviews}")

    if "stopwords" in data:
        print("stopwords found in data")
        user_stopwords = set(data["stopwords"].split())

    # # check if clean_reviews is empty when stopwords are removed
    tokens_without_sw = [word for word in clean_reviews.split() if word not in stopwords.union(user_stopwords)]
    if not tokens_without_sw:
        return abort(404, description="No words found")

    try:
        # show the most frequent words in the dataset in wordcloud
        wordcloud = WordCloud(
            colormap="Greens",
            width=1600,
            height=800,
            stopwords=stopwords.union(user_stopwords),
            background_color="white",
            max_words=250,
        ).generate(clean_reviews)

        plt.figure(figsize=(20, 10), facecolor=None)
        plt.imshow(
            wordcloud,
            interpolation="bilinear",
        )
        plt.axis("off")
        plt.tight_layout(pad=0)

        # Save the plot with the current date and time as the filename
        # file_name = f"{current_time}_positive.png"

        # plt.savefig(images_path / file_name)

        img_buffer = io.BytesIO()
        plt.savefig(img_buffer, format="png")
        img_buffer.seek(0)

        plt.clf()

        # return img_buffer
        # return images_path / file_name

        # plt.show()
        return send_file(img_buffer, mimetype="image/png")
    except Exception as e:
        print(e)
        return abort(500, description="An error occurred")


@app.post("/generatenegative")
def generatenegative():
    global user_stopwords
    data = request.get_json()

    if data is None:
        return abort(404, description="Data not found")

    # debug print
    reviews = data["reviews"]

    clean_reviews = datacleaner.clean_text(reviews)

    # debug print
    print(f"clean_reviews: {clean_reviews}")

    if "stopwords" in data:
        print("stopwords found in data")
        user_stopwords = set(data["stopwords"].split())

    # # check if clean_reviews is empty when stopwords are removed
    tokens_without_sw = [word for word in clean_reviews.split() if word not in stopwords.union(user_stopwords)]
    if not tokens_without_sw:
        return abort(404, description="No words found")

    try:
        # show the most frequent words in the dataset in wordcloud
        wordcloud = WordCloud(
            colormap="Reds",
            width=1600,
            height=800,
            stopwords=stopwords.union(user_stopwords),
            background_color="white",
            max_words=250,
        ).generate(clean_reviews)

        plt.figure(figsize=(20, 10), facecolor=None)
        plt.imshow(
            wordcloud,
            interpolation="bilinear",
        )
        plt.axis("off")
        plt.tight_layout(pad=0)

        # Save the plot with the current date and time as the filename
        # file_name = f"{current_time}_positive.png"

        # plt.savefig(images_path / file_name)

        img_buffer = io.BytesIO()
        plt.savefig(img_buffer, format="png")
        img_buffer.seek(0)

        plt.clf()

        # return img_buffer
        # return images_path / file_name

        # plt.show()
        return send_file(img_buffer, mimetype="image/png")
    except Exception as e:
        print(e)
        return abort(500, description="An error occurred")



@app.post("/generatewordcount")
def generatewordcount():
    global user_stopwords
    data = request.get_json()

    if data is None:
        return abort(404, description="Data not found")

    reviews = data["reviews"]

    clean_reviews = datacleaner.clean_text(reviews)

    # debug print
    # print(f"clean_reviews: {clean_reviews}")

    words = []
    # check if key exist in dictionary
    if "stopwords" in data:
        print("stopwords found in data")

        user_stopwords = set(data["stopwords"].split())

        # debug print
        # print(f"stopwords: {user_stopwords}")

        _stopwords = set(stopwords).union(user_stopwords)

        # Lowercase words and remove stopwords
        words = [
            word.lower() for word in clean_reviews.split() if word not in _stopwords
        ]
    else:
        _stopwords = set(stopwords)

        # Lowercase words and remove stopwords
        words = [
            word.lower() for word in clean_reviews.split() if word not in _stopwords
        ]

    # Count word frequencies
    word_counts = Counter(words)

    print(f"using stopwords: {_stopwords}")
    print(f"using user_stopwords: {user_stopwords}")

    # Find the 4 most frequent words (adjust k as needed)
    k = 20
    most_frequent = word_counts.most_common(k)

    # Convert word-count pairs to JSON format
    json_data = []

    # Print the results
    print("Top", k, "most frequent words (excluding stopwords):")
    for word, count in most_frequent:
        # print(word, ":", count)
        json_data.append({"word": word, "count": count})

    # return reviews
    # Return the JSON data
    return jsonify(json_data)
