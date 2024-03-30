import argparse

# Instantiate the parser
parser = argparse.ArgumentParser(description='Optional app description')

parser.add_argument('pos_arg', type=str,
                    help='A required integer positional argument')

args = parser.parse_args()

print(f'Heelo from pyhon {args.pos_arg}')
