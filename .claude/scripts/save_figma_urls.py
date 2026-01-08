import sys
from pathlib import Path
from utils import load_json_safe, save_json

def main():
    urls = sys.argv[1:]
    if not urls:
        print("Usage: python figma_url_parser.py [URL1] [URL2] ...")
        return

    json_path = Path(".claude/figma-urls.json")
    json_path.parent.mkdir(parents=True, exist_ok=True)

    # Load existing data
    data = {"urls": []}
    if json_path.exists():
        loaded = load_json_safe(json_path)
        if loaded:
            data = loaded

    # Add new URLs
    for url in urls:
        data["urls"].append(url)
        print(f"Added: {url}")

    # Save
    save_json(json_path, data)
    print(f"\nSaved: {json_path}")

if __name__ == "__main__":
    main()
