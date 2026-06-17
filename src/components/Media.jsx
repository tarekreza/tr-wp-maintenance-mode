import { useState, useEffect } from "@wordpress/element";
import { Button } from "@wordpress/components";

const Media = ({imageId, setImageId}) => {
  const [previewUrl, setPreviewUrl] = useState(null);

  useEffect(() => {
    if (!imageId) {
      setPreviewUrl(null);
      return;
    }
    // Try to resolve an existing attachment preview via wp.media
    try {
      const attachment = wp.media.attachment(imageId);
      if (attachment && typeof attachment.fetch === "function") {
        attachment
          .fetch()
          .then((att) => {
            const url = att?.sizes?.thumbnail?.url || att?.url;
            setPreviewUrl(url);
          })
          .catch(() => {
            setPreviewUrl(null);
          });
      }
    } catch (e) {
      setPreviewUrl(null);
    }
  }, [imageId]);

  const openMedia = (e) => {
    e.preventDefault();

    const frame = wp.media({
      title: "Select image",
      button: { text: "Use image" },
      library: { type: "image" },
      multiple: false,
    });

    frame.on("select", () => {
      const attachment = frame.state().get("selection").first().toJSON();
      const url = attachment.sizes?.thumbnail?.url || attachment.url;
      setPreviewUrl(url);
      setImageId(attachment.id);
    });

    frame.open();
  };

  return (
    <div>
      {previewUrl && (
        <div style={{ marginTop: 24 }}>
          <img
            src={previewUrl}
            alt="Preview"
            style={{ maxWidth: 120, height: "auto" }}
          />
        </div>
      )}
      <div>
        <Button
          style={{ marginTop: 24 }}
          variant="secondary"
          size = "compact"
          onClick={openMedia}
        >
          {imageId ? "Change Image" : "Select Image"}
        </Button>

        {imageId ? (
                    <Button
          style={{ marginLeft: 24 }}
          variant="tertiary"
          size="compact"
          onClick={() => {
              setPreviewUrl(null);
              setImageId(null);
            }}
        >
         Remove
        </Button>
        ) : null}
      </div>
    </div>
  );
};

export default Media;
