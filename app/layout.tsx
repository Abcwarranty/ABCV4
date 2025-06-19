import type React from "react"
import type { Metadata } from "next"
import { Inter } from "next/font/google"
import "./globals.css"

const inter = Inter({
  subsets: ["latin"],
  display: "swap",
})

export const metadata: Metadata = {
  title: "Policy Pilots - Coming Soon",
  description:
    "Your AI co-pilot for smarter insurance decisions is preparing for takeoff. Get notified when we launch.",
  keywords: "insurance, AI, comparison, policy, pilots, coming soon",
  authors: [{ name: "Policy Pilots" }],
  openGraph: {
    title: "Policy Pilots - Coming Soon",
    description: "Your AI co-pilot for smarter insurance decisions is preparing for takeoff.",
    type: "website",
    images: [
      {
        url: "/policy-pilots-logo.png",
        width: 400,
        height: 400,
        alt: "Policy Pilots Logo",
      },
    ],
  },
  twitter: {
    card: "summary_large_image",
    title: "Policy Pilots - Coming Soon",
    description: "Your AI co-pilot for smarter insurance decisions is preparing for takeoff.",
    images: ["/policy-pilots-logo.png"],
  },
  icons: {
    icon: [
      { url: "/favicon-16x16.png", sizes: "16x16", type: "image/png" },
      { url: "/favicon-32x32.png", sizes: "32x32", type: "image/png" },
    ],
    apple: [{ url: "/apple-touch-icon.png", sizes: "180x180", type: "image/png" }],
  },
    generator: 'v0.dev'
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="en" className="scroll-smooth h-full">
      <body className={`${inter.className} h-full overflow-hidden`}>{children}</body>
    </html>
  )
}
