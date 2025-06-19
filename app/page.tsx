"use client"

import type React from "react"
import { useState } from "react"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { CheckCircle } from "lucide-react"
import { PolicyPilotsLogo } from "@/components/policy-pilots-logo"

export default function ComingSoonPage() {
  const [email, setEmail] = useState("")
  const [isSubmitted, setIsSubmitted] = useState(false)
  const [isLoading, setIsLoading] = useState(false)

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    if (!email) return

    setIsLoading(true)

    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 1000))

    setIsSubmitted(true)
    setIsLoading(false)
    setEmail("")
  }

  return (
    <div className="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center p-4">
      <div className="max-w-2xl mx-auto text-center">
        {/* SVG Logo */}
        <div className="mb-8 animate-fade-in">
          <PolicyPilotsLogo
            width={500}
            height={350}
            className="mx-auto drop-shadow-lg hover:drop-shadow-xl transition-all duration-300 hover:scale-105"
          />
        </div>

        {/* Coming Soon Text */}
        <div className="mb-12 animate-fade-in-delay">
          <h1 className="text-4xl md:text-6xl font-bold text-gray-800 mb-4 tracking-tight">Coming Soon</h1>
          <p className="text-lg md:text-xl text-gray-600 leading-relaxed max-w-lg mx-auto">
            Your AI co-pilot for smarter insurance decisions is preparing for takeoff. Get ready to compare, switch, and
            save like never before.
          </p>
        </div>

        {/* Email Capture Form */}
        <div className="animate-fade-in-delay-2">
          {!isSubmitted ? (
            <form onSubmit={handleSubmit} className="max-w-md mx-auto">
              <div className="flex flex-col sm:flex-row gap-3">
                <Input
                  type="email"
                  placeholder="Get notified when we launch"
                  value={email}
                  onChange={(e) => setEmail(e.target.value)}
                  className="flex-1 h-12 px-4 text-base border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg"
                  required
                />
                <Button
                  type="submit"
                  disabled={isLoading}
                  className="h-12 px-6 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 hover:shadow-lg disabled:opacity-50"
                >
                  {isLoading ? (
                    <div className="flex items-center space-x-2">
                      <div className="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                      <span>Sending...</span>
                    </div>
                  ) : (
                    "Notify Me"
                  )}
                </Button>
              </div>
            </form>
          ) : (
            <div className="max-w-md mx-auto p-6 bg-green-50 border border-green-200 rounded-lg">
              <div className="flex items-center justify-center space-x-2 text-green-700">
                <CheckCircle className="w-5 h-5" />
                <span className="font-medium">Thanks! We'll notify you when we launch.</span>
              </div>
            </div>
          )}
        </div>

        {/* Footer */}
        <div className="mt-16 animate-fade-in-delay-3">
          <p className="text-sm text-gray-500">© 2024 Policy Pilots. All rights reserved.</p>
        </div>
      </div>
    </div>
  )
}
