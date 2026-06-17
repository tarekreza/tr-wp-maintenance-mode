import { useState, useEffect } from "@wordpress/element";
import {
  ToggleControl,
  Button,
  Spinner,
  TextControl,
} from "@wordpress/components";
import apiFetch from "@wordpress/api-fetch";
// for notices
import Notices from "./Notices";
import Media from "./Media";
import { store as noticesStore } from "@wordpress/notices";
import { useDispatch } from "@wordpress/data";

const SettingsPage = () => {
  const [maintenance, setMaintenance] = useState(false);
  const [headline, setHeadline] = useState("Site Under Maintenance");
  const [message, setMessage] = useState(
    "We're performing scheduled maintenance. Please try again later.",
  );
  const [spinner, setSpinner] = useState(true);
  const [saving, setSaving] = useState(false);

  // for notices
  const { createSuccessNotice, createErrorNotice } = useDispatch(noticesStore);

  const [imageId, setImageId] = useState(null);

  useEffect(() => {
    // Fetch settings from the database or an API when the  component mounts
    apiFetch({
      path: "/wp/v2/settings",
      method: "GET",
    })
      .then((response) => {
        setMaintenance(response.tr_maintenance_mode_settings?.maintenance);
        setHeadline(response.tr_maintenance_mode_settings?.headline);
        setMessage(response.tr_maintenance_mode_settings?.message);
        setImageId(response.tr_maintenance_mode_settings?.imageId);
        setSpinner(false);

      })
      .catch((error) => {
        console.log(error);
      });
  }, [spinner]);
  const saveSettings = () => {
    // Here you would typically save the settings to the database or an API
    setSaving(true);

    apiFetch({
      path: "/wp/v2/settings",
      method: "POST",
      data: {
        tr_maintenance_mode_settings: {
          maintenance: maintenance,
          headline: headline,
          message: message,
          imageId: imageId,
        },
      },
    })
      .then((response) => {
        // Show a success notice
        createSuccessNotice("Settings saved successfully!");
      })
      .catch((error) => {
        // Show an error notice
        createErrorNotice("Failed to save settings.");
        console.log(error);
      })
      .finally(() => {
        setSaving(false);
      });
  };

  if (spinner) {
    return <Spinner />;
  }
  return (
    <>
      <Notices />
      <h1 style={{ marginBottom: 24 }}>Maintenance Mode Settings</h1>
      <ToggleControl
        label="Enable Maintenance Mode"
        help={
          maintenance
            ? "Maintenance mode is active — visitors will see the maintenance page."
            : "Maintenance mode is disabled — visitors will see the site as normal."
        }
        checked={maintenance}
        onChange={setMaintenance}
      />
      <TextControl
        __next40pxDefaultSize
        label="Headline"
        value={headline}
        onChange={(value) => setHeadline(value)}
      />
      <TextControl
        __next40pxDefaultSize
        label="Message"
        value={message}
        onChange={(value) => setMessage(value)}
      />
      <Media imageId={imageId} setImageId={setImageId} />
      <Button
        style={{ marginTop: 32 }}
        variant="primary"
        onClick={saveSettings}  
        isBusy={saving}
        disabled={saving}
      >
        {saving ? "Saving..." : "Save Settings"}
      </Button>
    </>
  );
};

export default SettingsPage;
