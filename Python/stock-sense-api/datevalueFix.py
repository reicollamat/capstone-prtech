from datetime import datetime, timedelta


def datevalueFix(data: list[dict]):
    for item in data:
        # Parse datetime string to datetime object
        created_at_datetime = datetime.strptime(item['created_at'], '%Y-%m-%d %H:%M:%S')
        # Extract date part and update the dictionary
        item['created_at'] = created_at_datetime.date().strftime('%Y-%m-%d')

    return data


def fill_missing_dates(data: list[dict]) -> list[dict]:
    # Extract all 'created_at' dates from the dictionaries
    dates = [datetime.strptime(item['created_at'], '%Y-%m-%d').date() for item in data]

    # Find the minimum and maximum dates
    min_date = min(dates)
    max_date = max(dates)

    # Generate all dates between min and max dates
    all_dates = [min_date + timedelta(days=i) for i in range((max_date - min_date).days + 1)]

    # Create a set of existing dates for faster lookup
    existing_dates = set(dates)

    # Fill missing dates with quantity 0
    for date in all_dates:
        if date not in existing_dates:
            data.append({'created_at': date.strftime('%Y-%m-%d'), 'quantity': 0})

    # Sort the data based on 'created_at' key
    data.sort(key=lambda x: x['created_at'])

    return data
