# from collections import Counter
#
# # from nltk.corpus import stopwords  # Import stopwords from NLTK
# from stopword import preprocess
#
# # Define stopwords list (feel free to customize)
# stop_words = preprocess()
#
# # Data set with stopwords removed
# data_set = (
#     "Welcome to the world of Geeks "
#     "This portal created provide well written well"
#     "thought well explained solutions selected questions "
#     "Geeks Geeks contribute chance write article mail article "
#     "contribute geeksforgeeks org See article appearing "
#     "Geeks Geeks main page help thousands other Geeks. "
# )
#
# # Lowercase words and remove stopwords
# words = [word.lower() for word in data_set.split() if word not in stop_words]
#
#
# # Count word frequencies
# word_counts = Counter(words)
#
# # Find the 4 most frequent words (adjust k as needed)
# k = 20
# most_frequent = word_counts.most_common(k)
#
# # Print the results
# print("Top", k, "most frequent words (excluding stopwords):")
# for word, count in most_frequent:
#     print(word, ":", count)

# # example usage of global variable
# global x
# x = 10
